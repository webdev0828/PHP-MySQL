jQuery(function ($) {
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function getParameterByNamew(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^?#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
//
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
    $.fn.dataTable.pipeline = function ( opts ) {
        // Configuration options
        var conf = $.extend( {
            pages: 10,    // number of pages to cache
            url: '',      // script url
            data: null,   // function or object with parameters to send to the server
                          // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
        }, opts );

        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        var cacheLastJson = null;

        return function ( request, drawCallback, settings ) {
            var ajax          = false;
            var requestStart  = request.start;
            var drawStart     = request.start;
            var requestLength = request.length;
            var requestEnd    = requestStart + requestLength;

            if ( settings.clearCache ) {
                // API requested that the cache be cleared
                ajax = true;
                settings.clearCache = false;
            }
            else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                // outside cached data - need to make a request
                ajax = true;
            }
            else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
            ) {
                // properties changed (ordering, columns, searching)
                ajax = true;
            }

            // Store the request for checking next time around
            cacheLastRequest = $.extend( true, {}, request );

            if ( ajax ) {
                // Need data from the server
                if ( requestStart < cacheLower ) {
                    requestStart = requestStart - (requestLength*(conf.pages-1));

                    if ( requestStart < 0 ) {
                        requestStart = 0;
                    }
                }

                cacheLower = requestStart;
                cacheUpper = requestStart + (requestLength * conf.pages);

                request.start = requestStart;
                request.length = requestLength*conf.pages;

                // Provide the same `data` options as DataTables.
                if ( typeof conf.data === 'function' ) {
                    // As a function it is executed with the data object as an arg
                    // for manipulation. If an object is returned, it is used as the
                    // data object to submit
                    var d = conf.data( request );
                    if ( d ) {
                        $.extend( request, d );
                    }
                }
                else if ( $.isPlainObject( conf.data ) ) {
                    // As an object, the data given extends the default
                    $.extend( request, conf.data );
                }

                settings.jqXHR = $.ajax( {
                    "type":     conf.method,
                    "url":      conf.url,
                    "data":     request,
                    "dataType": "json",
                    "cache":    false,
                    "success":  function ( json ) {
                        cacheLastJson = $.extend(true, {}, json);

                        if ( cacheLower != drawStart ) {
                            json.data.splice( 0, drawStart-cacheLower );
                        }
                        if ( requestLength >= -1 ) {
                            json.data.splice( requestLength, json.data.length );
                        }

                        drawCallback( json );
                    },
                    "error" : function(e){
                        window.location.reload();
                    }
                } );
            }
            else {
                json = $.extend( true, {}, cacheLastJson );
                json.draw = request.draw; // Update the echo for each response
                json.data.splice( 0, requestStart-cacheLower );
                json.data.splice( requestLength, json.data.length );

                drawCallback(json);
            }
        }
    };

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register( 'clearPipeline()', function () {
        return this.iterator( 'table', function ( settings ) {
            settings.clearCache = true;
        } );
    } );

    if ($('#dyntable_commission_list').length > 0) {
        $('#dyntable_commission_list').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_report.php?report=" + getParameterByName('report'),
            "bDeferRender": true,
            "aoColumnDefs": [{"bSortable": false, "aTargets": [4]}],
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }
        });
    }
    if ($('#dyntable_commission_list_subs').length > 0) {
        $('#dyntable_commission_list_subs').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_report.php?report=" + getParameterByName('report'),
            "bDeferRender": true,
            "aoColumnDefs": [{"bSortable": false, "aTargets": [4]}],
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }

    if ($('#dyntable_payment_history').length > 0) {
        $('#dyntable_payment_history').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_history.php?report=3",
            "bDeferRender": true,
            "aoColumnDefs": [{"targets": 'no-sort', "orderable": false}],
            "columns": [{ className: "date-column" },null,null,null],
            "aaSorting": [[0, "desc"]],
            "bFilter": false,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "dom": "<'row'<'col-sm-6 col-sm-offset-6 text-right'l>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            },
            "footerCallback": function ( row, data, start, end, display ) {
                if(this.api().rows().count() === 1)
                {
                    $("#dyntable_payment_history tfoot").hide();
                    return;
                }else{
                    $("#dyntable_payment_history tfoot").show();
                }
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\%,€,<span class="label label-success">,<span>,</span>]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over this page
                totalCommissions = api
                    .column(1, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Total over this page
                totalEarnings = api
                    .column(2, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Update footer
                $(api.column(1).footer()).html(
                    Math.abs(totalCommissions.toLocaleString())
                );
                $( api.column(2).footer() ).html(
                    totalEarnings.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €"
                );
            }
        });
    }
    $(document).ready(function() {
        if ($('#dyntable_Offers').length > 0) {
            var availableDevicesHtml='<option value=""></option>';
            var availableOsHtml='<option value=""></option>';
            var availableConnectionHtml='<option value=""></option>';
            var availableCarrierHtml='<option value=""></option>';
            //var offer_id = "{$offer_id}"
            var offerstbl = $('#dyntable_Offers').DataTable({
                "dom":  "<'row'<'col-sm-12 col-md-6'Bl><'col-sm-12 col-md-6'<'offers-filter'>f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "buttons":[{
                    "extend": "colvis",
                    "columns": ":gt(0)"
                }],
                //"oSearch": {"sSearch": offer_id},
                "searchHighlight": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/templates/internals/core_ajax_offers.php",
                "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                    aoData.push({"name": "iOfferFilter", "value": $("#iOfferFilter").val()}) //pushin iOfferFilter param
                    oSettings.jqXHR = $.ajax( {
                        "dataType": 'json',
                        "url": sSource,
                        "data": aoData,
                        "success": fnCallback,
                        "error": function(){
                            window.location.reload();
                        }
                    } );
                },
                "bDeferRender": true,
                "aoColumnDefs": [
                    {"type":"html-num-fmt","targets":[9]},
                    {"bVisible":false, "aTargets":[4, 5, 6, 7]},
                    {"width":"8px","aTargets":[0]},
                    {"bSortable": false, "aTargets":[0]},
                    {"className":"dt-body-left","aTargets":[0]},
                    {"className":"dt-body-right","aTargets":[9]}],
                "aaSorting": [[9, "desc"],[1, "asc"]],
                "bFilter": true,
                "bResponsive": true,
                "oLanguage": {
                    "sEmptyTable": langDataTable["sEmptyTable"],
                    "sInfo": langDataTable["sInfo"],
                    "sInfoEmpty": langDataTable["sInfoEmpty"],
                    "sInfoFiltered": langDataTable["sInfoFiltered"],
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": langDataTable["sLengthMenu"],
                    "sLoadingRecords": langDataTable["sLoadingRecords"],
                    "sProcessing": langDataTable["sProcessing"],
                    "sSearch": langDataTable["sSearch"],
                    "sZeroRecords": langDataTable["sZeroRecords"],
                    "oPaginate": {
                        "sFirst": langDataTable["sFirst"],
                        "sLast": langDataTable["sLast"],
                        "sNext": langDataTable["sNext"],
                        "sPrevious": langDataTable["sPrevious"]
                    },
                    "oAria": {
                        "sSortAscending": langDataTable["sSortAscending"],
                        "sSortDescending": langDataTable["sSortDescending"]
                    }
                },
                initComplete: function (oSettings,json) {
                    $.each(json.availableNiche,function (idx,niche) {
                        if (niche.niche !== '') {
                            $('#niche-filter').append('<option>' +niche.niche+ '</option>')
                        }
                    })
                    $.each(json.availableDevices,function (idx,devices) {
                        if (devices != '') {
                            availableDevicesHtml+='<option value="'+ devices+'">' + devices+ '</option>';
                        }
                    });
                    $('#devices-filter').html(availableDevicesHtml);
                    $.each(json.availableOs,function (idx,os) {
                        if (os !== '') {
                            availableOsHtml+='<option>' +os+ '</option>';
                        }
                    })
                    $('#os-filter').html(availableOsHtml);
                    $.each(json.availableConnection,function (idx,connection) {
                        if (connection !== '') {
                            availableConnectionHtml+='<option>' +connection+ '</option>';
                        }
                    })
                    $('#connection-filter').html(availableConnectionHtml);
                    // $.each(json.availableCarrier,function (idx,carriers) {
                    //     if (carriers !== '') {
                    //         availableCarrierHtml+='<option>' +carriers+ '</option>';
                    //     }
                    // })
                    // $('#carrier-filter').html(availableCarrierHtml);
                    $.each(json.availableFlow,function (idx,flow) {
                        if (flow !== '') {
                            $('#flow-filter').append('<option>' +flow+ '</option>')
                        }
                    })
                    $.each(json.allCountries,function (idx,country) {
                        if (country.country_code != '') {
                            $('#country-filter').append('<option value="'+country.country_code+'">'+country.country_name+'</option>')
                        }
                    })
                },
                drawCallback: function (settings) {
                    $('#dyntable_Offers tbody td:nth-child(2)').css('text-align','left')
                    $('#dyntable_Offers tbody td:nth-child(1)').css('padding','0')
                    $('#dyntable_Offers thead th:nth-child(1)').css('width','9px')
                    $('.data-tooltip').each(function () {
                        if ($(this).html() == "") {
                            $(this).remove()
                        }
                    })
                }
            }); 
            $('.offers-filter').html('Offer Types\
                        <select id="iOfferFilter" name="iOfferFilter" type="text" class="form-control" style="width:115px;z-index:5;margin:3px;margin-left:5px;">\
                            <option value="">All</option>\
                            <option value="1">HOT</option>\
                            <option value="2">IN-HOUSE</option>\
                            <option value="3">Running</option>\
                        </select>');
                    $('.offers-filter').on('change',function (aoData) {
                        offerstbl.draw()
                    })
            $('#dyntable_Offers').on( 'column-visibility.dt', function ( e, settings, column, state ) {
                if(column == 4){
                    $('#devices-filter').html(availableDevicesHtml);
                    $('#devices-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([4]).search(keyword).draw()
                    })
                }
                if(column == 5){
                    $('#os-filter').html(availableOsHtml);
                    $('#os-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([5]).search(keyword).draw()
                    })
                }
                if(column == 6){
                    $('#connection-filter').html(availableConnectionHtml);
                    $('#connection-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([6]).search(keyword).draw()
                    })
                }
                // if(column == 7){
                //     $('#carrier-filter').html(availableCarrierHtml);
                //     $('#carrier-filter').on('change',function () {
                //         var keyword = $(this).val()
                //         offerstbl.columns([7]).search(keyword).draw()
                //     })
                // }
            } );
            var offerDetailRows = [];
            function formatDetails ( d ) {
                $.ajax({
                    url: '/templates/internals/core_ajax_offers_detail.php?id=' + d[10],
                    dataType:'json',
                    success: function (resp) {
                        var html = ''
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse in"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#offer-details-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-info-circle fa-fw"></i> '+jstext.language.custom_offer_details+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse in" id="offer-details-'+d[10]+'"> \
                        <div class="form-horizontal"> \
                            <div class="form-group"> \
                                <div class="col-md-8"> \
                                    <div class="col-sm-12 offer-description"> \
                                    <strong class="subtitle">'+jstext.language.custom_niche+':</strong> '+resp.data.niche+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_countries+':</strong> '+resp.data.countries+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_devices+':</strong> '+resp.data.devices+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_os+':</strong> '+resp.data.os+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_connection_type+':</strong> '+resp.data.connection+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_mobile_carriers+':</strong> '+resp.data.carrier+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_flow_type+':</strong> '+resp.data.flow_type+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_payout+':</strong> '+resp.sub_payout_details+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_conversion_flow+':</strong> '+resp.data.conversion_flow+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_restrictions+':</strong> '+resp.data.restrictions+'<br /><br />\
                                    '+jstext.language.custom_need_more_creatives+' '+jstext.language.custom_please+' <a href="javascript:void(Tawk_API.toggle())"><strong>'+jstext.language.custom_contact_manager+'</strong></a> '+jstext.language.custom_for_discussion+'!\
                                    </div> \
                                </div> \
                                <div class="col-md-4"> \
                                    <div class="col-sm-12 control-label"> \
                                        <div class="offer-imgs"> \
                                        <img src="/images/offers_thumbs/'+resp.data.offer_image+'" alt="'+resp.data.name+'" title="'+resp.data.name+'">\
                                        </div>\
                                    </div> \
                                </div> \
                            </div> \
                        </div> \
                                    </div> \
                                </div> \
                            </div>')
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                        <div class="portlet-title" style="color:#ffffff;"> \
                                                <h4 data-toggle="collapse" data-target="#postbacksholder-'+d[10]+'"> \
                                            <span class="pull-right"> \
                                                <i class="fa fa-angle-down"></i> \
                                            </span> \
                                                <i class="fa fa-server fa-fw"></i> S2S Postback \
                                            </h4> \
                                        </div> \
                                        <div class="portlet-body collapse" id="postbacksholder-'+d[10]+'"> \
                                                <div class="portlet" style="border-color:#532B72;"> \
                                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                                            <div class="portlet-title" style="color:#ffffff;"> \
                                                                <h4> \
                                                                    <i class="fa fa-link fa fw"></i> Offer '+d[10]+' Action Notification #X \
                                                                </h4> \
                                                            </div> \
                                                    </div> \
                                                    <div class="portlet-body"> \
                                                        <div class="form-group"> \
                                                            <label class="col-sm-1 control-label" style="font-weight:normal;">URL</label> \
                                                            <div class="col-sm-10"> \
                                                                <input type="text" class="form-control" name="e_postback_url" size="60" placeholder="XXX" value="XXX" maxlength="1024"> \
                                                            </div> \
                                                            <div class="col-sm-1"> \
                                                                <input class="btn btn-primary" type="submit" value="Submit"> \
                                                            </div> \
                                                        </div> \
                                                    </div> \
                                                </div> \
    TODO: add ADD (+) and REMOVE (-) buttons \
    +- auto increment on each new action notification item and write to/delete from db on submit input button) \
                                        </div> \
                                    </div> \
                                </div>')
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#customization-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-sliders-h fa-fw"></i> '+jstext.language.custom_link_customization+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="customization-'+d[10]+'"> \
                                        <ul class="list-group"> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_sub_id+':</label> \
                                                <input class="tid select-selected" type="text" id="sub_id-'+d[10]+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 1:</label> \
                                                <input class="tid select-selected" type="text" id="tid-1-'+d[10]+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 2:</label> \
                                                <input class="tid select-selected" type="text" id="tid-2-'+d[10]+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 3:</label> \
                                                <input class="tid select-selected" type="text" id="tid-3-'+d[10]+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 4:</label> \
                                                <input class="tid select-selected" type="text" id="tid-4-'+d[10]+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <button id="add_parameters-'+d[10]+'" name="submit" class="btn btn-primary"> \
                                                '+jstext.language.custom_apply_tracking+' \
                                                </button> \
                                            </li> \
                                        </ul> \
                                    </div> \
                                </div> \
                            </div>')
                        if(resp.link.length > 0) {
                            html += '<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#linksholder-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-link fa-fw"></i> '+jstext.language.custom_links+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="linksholder-'+d[10]+'"> \
                            <div class="row">\
                            <div class="col-md-4"><label>'+jstext.language.custom_filter_by_landing+'</label><br>' +
                                '<select class="js-example-basic-single form-control" id="landSelect'+d[10]+'"  onchange="filterLinks(' + d[10] + ',\'landChanged\')">' +
                                '<option value="" selected>'+jstext.language.custom_all+'</option>' +
                                '<option value="1">'+jstext.language.custom_landing+'</option>' +
                                '<option value="0">'+jstext.language.custom_pre_landing+'</option>' +
                                '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2({width: "resolve"}); });</script></div>';
                            html += '<div class="col-md-4"><label id="linktextLabel' + d[10] + '"';
                            if(resp.linktext.length <= 1) {
                                html += ' ';
                            }
                            html += ' >'+jstext.language.custom_filter_by_set+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="linktextSelect' + d[10] + '" onchange="filterLinks(' + d[10] + ',\'linktextChanged\')"';
                            if(resp.linktext.length <= 1) {
                                html += ' disabled';
                            }
                            html += ' >';
                            if(resp.linktext.length > 0) {
                                html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                                $.each(resp.linktext, function (idx, c) {
                                    if (c != "") {
                                        html += '<option>' + c + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';
                            html += '<div class="col-md-4"><label id="linkCountriesLabel' + d[10] + '"';
                            if(resp.countries.length <= 1) {
                                html += ' ';
                            }
                            html += ' >'+jstext.language.custom_custom_filter_by_geo+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="linkCountriesSelect' + d[10] + '" onchange="filterLinks(' + d[10] + ',\'countryChanged\')"';
                            if(resp.countries.length <= 1) {
                                html += ' disabled';
                            }
                            html += ' >';
                            if(resp.countries.length > 0) {
                                 html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                                $.each(resp.countries, function (idx, c) {
                                    if (c != "") {
                                        html += '<option>' + c + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';

                            html += '</div>'; // TODO: Filter only HOT
                        }
                        html += '<div id="linksContainer'+d[10]+'">';
                        $.each(resp.link,function (idx,data) {
                            html += ('<div class="portlet banner-port" style="border-color: #20003F;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                            var epc=data.earnings / data.hits * 100;
                            var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="Running Link: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                            if(epc >= 0.3 && sr >= 0.3){
                                html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            else{
                                html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            html +=('     </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                            html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                            $("#add_parameters-'+d[10]+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+d[10]+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+d[10]+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+d[10]+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+d[10]+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+d[10]+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                            $.each(resp.banners,function (idx,data) {
                                html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                                var innerVal='<a href="'+data.lnk+'\'+ params_text+\'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                                html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                                html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                                var innerVal2=''+data.lnk+'\'+ params_text+\'';
                                html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                            });
                            html+= ('}); \
                        });</script>\
                        <script>$("input").on("keyup",function() {\
                        var maxLength = $(this).attr("maxlength");\
                        if(maxLength == $(this).val().length) {\
                        swal("'+jstext.language.custom_max_length_reached+'\\n'+jstext.language.custom_limit_is+' " + maxLength + "!")\
                        }\
                        })</script>')
                        });
                        html += '</div> \
                                </div> \
                            </div> \
                        </div>';
                        if(resp.banners.length > 0) {
                            html += '<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#bannerholder-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-image fa-fw"></i> '+jstext.language.custom_banners+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="bannerholder-'+d[10]+'"> \
                            <div><div class="row">'
                            html += '<div class="col-md-3"><label id="descriptionLabel'+ d[10] +'"';
                            if(resp.description.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >'+jstext.language.custom_filter_by_set+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="descriptionSelect'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'descriptionChanged\')"';
                            if(resp.description.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >';
                            if(resp.description.length > 1){
                                html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                                $.each(resp.description, function (idx, l) {
                                    if(l != ""){
                                        html += '<option>' + l + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';

                            html += '<div class="col-md-3"><label id="size1Label'+ d[10] +'"';
                            if(resp.size1.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >'+jstext.language.custom_filter_by_width+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="size1Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size1Changed\')"';
                            if(resp.size1.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >';
                            if(resp.size1.length > 1){
                                html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                                $.each(resp.size1, function (idx, s1) {
                                    html += '<option>' + s1 + '</option>';
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';

                            html += '<div class="col-md-3"><label id="size2Label'+ d[10] +'"';
                            if(resp.size2.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >'+jstext.language.custom_filter_by_height+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="size2Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size2Changed\')"';
                            if(resp.size2.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >';
                            if(resp.size2.length > 1){
                                html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                                $.each(resp.size2, function (idx, s2) {
                                    html += '<option>' + s2 + '</option>';
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';

                            html += '<div class="col-md-3"><label id="languageLabel'+ d[10] +'"';
                            if(resp.language.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >'+jstext.language.custom_filter_by_language+'</label><br>';
                            html += '<select class="js-example-basic-single form-control" id="languageSelect' + d[10] + '" onchange="filterBanners(' + d[10] + ',\'languageChanged\')"';
                            if(resp.language.length <= 1) {
                                html += ' style="display:none"';
                            }
                            html += ' >';
                            if(resp.language.length > 1) {
                                html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                                $.each(resp.language, function (idx, l) {
                                    if (l != "") {
                                        html += '<option>' + l + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script></div>';
                            html += '</div>';
                        }
                        html += '<div id="bannersContainer'+d[10]+'">';
                        $.each(resp.banners,function (idx,data) {
                            html += '<div class="portlet banner-port" style="border-color: #20003F;">'
                            html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">'
                            html += '<div class="portlet-title">'
                            var epc=data.earnings / data.hits * 100;
                            var sr=data.conv / data.hits * 100;
                            if (resp.running_banners.indexOf(data.number) >= 0) {
                            var running='<span class="badge running" title="Running Banner: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                            if(epc >= 0.3 && sr >= 0.3){
                                html += ('<h4><span class="label label-success">HOT</span> '+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            else{
                                html += ('<h4>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="portlet-body">'
                            html += '<ul class="list-group">'
                            html += '<li class="list-group-item">'
                            html += '<label style="width:100%">'
                            html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                            html += '<br/><br/> <i class="fas fa-code fa-fw"></i> '+jstext.language.marketing_source_code
                            html += '</label>'
                            html += '<br/>'
                            html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                            html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                            html += '</textarea>'
                            html += '<br/>'
                            html +=('<label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> <textarea style="font-weight:normal !improtant;" id="banner-direct-link-'+data.grp+'-'+data.number+'" rows="1" class="form-control">'+data.lnk+'</textarea>')
                            html += '<br/>'
                            html += '<a href="//static.sublimerevenue.com/'+data.image+'" download><button class="btn btn-primary"><i class="fa fa-download"></i> '+jstext.language.custom_download+'</button></a>'
                            html += '</li>'
                            html += '</ul>'
                            html += '</div>'
                            html += '</div>'
                            html += ('<script>$(document).ready(function () { \
                            $("#embed-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                        })</script>')
                            html += ('<script>$(document).ready(function () { \
                            $("#banner-direct-link-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                        })</script>')
                        });
                        html += '</div> \
                                </div> \
                            </div> \
                        </div>';
                        $('#row-details-' + d[10]).html(html);

                    },
                    error: function () {
                        alert('Unable to fetch details.');
                    }
                })

                return '<div id="row-details-'+d[10]+'">'+langDataTable['sProcessing']+'</div>'
            }

            $('#devices-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([4]).search(keyword).draw()
            })
            $('#os-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([5]).search(keyword).draw()
            })
            $('#connection-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([6]).search(keyword).draw()
            })
            $('#carrier-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([7]).search(keyword).draw()
            })
            $('#niche-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([2]).search(keyword).draw()
            })
            $('#flow-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([8]).search(keyword).draw()
            })
            $('#country-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([3]).search(keyword).draw()
            })
            $('#dyntable_Offers tbody').on('click', 'tr .row-details-toggle', function () {
                $(this).toggleClass('open')
                var tr = $(this).closest('tr');
                var row = offerstbl.row( tr );
                var data = row.data();
                var idx = $.inArray( tr.attr('id'), offerDetailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    offerDetailRows.splice( idx, 1 );
                } else {
                    tr.addClass( 'details' );
                    row.child( formatDetails(data) ).show()

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        offerDetailRows.push( tr.attr('id') );
                    }
                }
            } );

            offerstbl.on( 'draw', function () {
                $.each( offerDetailRows, function ( i, id ) {
                    $('#'+id).trigger( 'click' );
                } );
            } );
        }
    } );
    if ($('#dyntable_payment_Traffic').length > 0) {
        $('#dyntable_payment_Traffic').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_traffic.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }
    // general statistics
    $(document).ready(function() {
    if ($('#dyntable_Postbacks_Logs').length > 0) {
/*            var startD = moment().format("YYYY-MM-DD");
            var endD = moment().format("YYYY-MM-DD");*/
        $('#dyntable_Postbacks_Logs').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_postbacks_logs.php",
            "bDeferRender": true,
            "dom": "<'row'<'col-sm-6 col-sm-offset-6 text-right'l>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "aoColumnDefs": [{"className": "postback_url", "aTargets": [7]}],
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
/*
TODO: add date range picker for postbacks logs
            $('#postback-range').daterangepicker({
                startDate: moment(),
                endDate: moment(),
                maxDate: moment(),
                showWeekNumbers: true,
                ranges: {
                    [trans.custom_today]: [moment(), moment()],
                    [trans.custom_yesterday]: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    [trans.custom_last_seven_days]: [moment().subtract(6, 'days'), moment()],
                    [trans.custom_last_thirty_days]: [moment().subtract(29, 'days'), moment()],
                    [trans.custom_this_month]: [moment().startOf('month'), moment().endOf('month')],
                    [trans.custom_last_month]: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    [trans.custom_this_year]: [moment().startOf('year'), moment().endOf('year')],
                    [trans.custom_last_year]: [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                },
                locale: {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "applyLabel": trans.custom_apply,
                    "cancelLabel": trans.custom_custom_cancel,
                    "fromLabel": trans.custom_from,
                    "toLabel": trans.custom_to,
                    "customRangeLabel": trans.custom_custom,
                    "weekLabel": trans.custom_w,
                    "daysOfWeek": [
                        trans.custom_su,
                        trans.custom_mo,
                        trans.custom_tu,
                        trans.custom_we,
                        trans.custom_th,
                        trans.custom_fr,
                        trans.custom_sa
                    ],
                    "monthNames": [
                        trans.custom_january,
                        trans.custom_february,
                        trans.custom_march,
                        trans.custom_april,
                        trans.custom_may,
                        trans.custom_june,
                        trans.custom_july,
                        trans.custom_august,
                        trans.custom_september,
                        trans.custom_october,
                        trans.custom_november,
                        trans.custom_december
                    ],
                    "firstDay": 1
                }
            }, function (start, end, label) {
                startD = start.format("YYYY-MM-DD");
                endD = end.format("YYYY-MM-DD");
                dyntable_Stats
                    .columns(0)
                    .search(startD + "|" + endD)
                    .draw();
            });
*/
    }
        if ($('#dyntable_Stats').length > 0) {

            var startD = moment().format("YYYY-MM-DD");
            var endD = moment().format("YYYY-MM-DD");
            var dyntable_Stats = $('#dyntable_Stats').DataTable({
                "bProcessing": true,
                "bServerSide": true,
                "bFilter": true,
                "bResponsive": true,
                // "ajax": $.fn.dataTable.pipeline( {
                "ajax": {
                    "url": "/templates/internals/core_ajax_stats.php",
                    // "url": "/templates/internals/core_ajax_stats_new.php",
                    "data": function (d) {
                        d.startD = moment().format("YYYY-MM-DD")
                        d.endD = moment().format("YYYY-MM-DD")
                        d.aggregate = $('#aggregate').val()
                        d.pages = 10
                    }
                },
                // "rowId" : 'DT_RowId',
                "bDeferRender": true,
                "dom": "<'row'<'col-sm-6 col-sm-offset-6 text-right'l>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "columns": [
                    {"data": "date_", "className": "date-column"},
                    {"data": "raw_visits", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "raw_visits details-control",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {"data": "unique_visits", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "details-control unique_visits",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "transactions", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "details-control transactions",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "sales_ratio", render: $.fn.dataTable.render.number(',', '.', 3, '', '%')},
                    {
                        "class": "details-control sales_ratio",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "epc", render: $.fn.dataTable.render.number(',', '.', 4, '',' €')},
                    {
                        "class": "details-control epc",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "earnings", render: $.fn.dataTable.render.number(',', '.', 2, '', ' €')},
                    {
                        "class": "details-control earnings",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    }
                ],
                'columnDefs': [
                    {
                        'targets': [2,4,6,8,10],
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            $(td).attr('tabindex', '0');
                        }
                    }
                ],
                "aaSorting": [[0, 'desc']],
                "oLanguage": {
                    "sEmptyTable": langDataTable["sEmptyTable"],
                    "sInfo": langDataTable["sInfo"],
                    "sInfoEmpty": langDataTable["sInfoEmpty"],
                    "sInfoFiltered": langDataTable["sInfoFiltered"],
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": langDataTable["sLengthMenu"],
                    "sLoadingRecords": langDataTable["sLoadingRecords"],
                    "sProcessing": langDataTable["sProcessing"],
                    "sSearch": langDataTable["sSearch"],
                    "sZeroRecords": langDataTable["sZeroRecords"],
                    "oPaginate": {
                        "sFirst": langDataTable["sFirst"],
                        "sLast": langDataTable["sLast"],
                        "sNext": langDataTable["sNext"],
                        "sPrevious": langDataTable["sPrevious"]
                    },
                    "oAria": {
                        "sSortAscending": langDataTable["sSortAscending"],
                        "sSortDescending": langDataTable["sSortDescending"]
                    }
                },
                "footerCallback": function (row, data, start, end, display) {
                    if(this.api().rows().count() === 1)
                    {
                        $("#dyntable_Stats tfoot").hide();
                        return;
                    }else{
                        $("#dyntable_Stats tfoot").show();
                    }
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\%,€]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    totalRaw = api
                        .column(1, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalUnique = api
                        .column(3, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalTransactions = api
                        .column(5, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalEarnings = api
                        .column(11, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(1).footer()).html(
                        totalRaw.toLocaleString()
                    );
                    $(api.column(3).footer()).html(
                        totalUnique.toLocaleString() // should NOT be sum but rather querried based on day/month/year interval selection for the requested date range
                    );
                    $(api.column(5).footer()).html(
                        totalTransactions.toLocaleString()
                    );
                    if (totalUnique === 0) {
                        $(api.column(7).footer()).html(
                            (0).toFixed(3) + "%"
                        );
                    } else {
                        $(api.column(7).footer()).html(
                            (totalTransactions / totalRaw * 100).toFixed(3) + "%"
                        );
                    }
                    if (totalUnique === 0) {
                        $(api.column(9).footer()).html(
                            (0).toFixed(2) + " €"
                        );
                    } else {
                        $(api.column(9).footer()).html(
                            (totalEarnings / totalRaw * 100).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €"
                        );
                    }
                    $(api.column(11).footer()).html(
                        totalEarnings.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €"
                    );
                }
            });
            /*
             real-time update
             TODO: redraw only today's details and keep row details open, if any
             make it work only for row1 when today is included in date range, make it not close child rows, make it re-calculate top 4 bars stats, too
             does not work because of pipeline
             setInterval( function () {
             dyntable_Stats.ajax.reload( null, false ); // user paging is not reset on reload
             }, 10000 );
             */
            var trans = JSON.parse($("#trans").val());

            $('#range').daterangepicker({
                startDate: moment(),
                endDate: moment(),
                maxDate: moment(),
                showWeekNumbers: true,
                ranges: {
                    [trans.custom_today]: [moment(), moment()],
                    [trans.custom_yesterday]: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    [trans.custom_last_seven_days]: [moment().subtract(6, 'days'), moment()],
                    [trans.custom_last_thirty_days]: [moment().subtract(29, 'days'), moment()],
                    [trans.custom_this_month]: [moment().startOf('month'), moment().endOf('month')],
                    [trans.custom_last_month]: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    [trans.custom_this_year]: [moment().startOf('year'), moment().endOf('year')],
                    [trans.custom_last_year]: [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
                },
                locale: {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "applyLabel": trans.custom_apply,
                    "cancelLabel": trans.custom_custom_cancel,
                    "fromLabel": trans.custom_from,
                    "toLabel": trans.custom_to,
                    "customRangeLabel": trans.custom_custom,
                    "weekLabel": trans.custom_w,
                    "daysOfWeek": [
                        trans.custom_su,
                        trans.custom_mo,
                        trans.custom_tu,
                        trans.custom_we,
                        trans.custom_th,
                        trans.custom_fr,
                        trans.custom_sa
                    ],
                    "monthNames": [
                        trans.custom_january,
                        trans.custom_february,
                        trans.custom_march,
                        trans.custom_april,
                        trans.custom_may,
                        trans.custom_june,
                        trans.custom_july,
                        trans.custom_august,
                        trans.custom_september,
                        trans.custom_october,
                        trans.custom_november,
                        trans.custom_december
                    ],
                    "firstDay": 1
                }
            }, function (start, end, label) {
                startD = start.format("YYYY-MM-DD");
                endD = end.format("YYYY-MM-DD");
                dyntable_Stats
                    .columns(0)
                    .search(startD + "|" + endD)
                    .draw();
                /*console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));*/
            });
            $('#aggregate').on('change',function () {
                // if ($(this).val() == 'monthly') {
                //     var dddd= moment().subtract(1,'months').format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment().subtract(1,'months').format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment().subtract(1,'months').format('YYYY-MM-DD').replace(' - ','|')).draw()
                // } else if ($(this).val() == 'yearly') {
                //     var dddd= moment().subtract(1,'years').format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment().subtract(1,'years').format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment().subtract(1,'years').format('YYYY-MM-DD').replace(' - ','|')).draw()
                // } else {
                //     var dddd= moment().format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment().format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment().format('YYYY-MM-DD').replace(' - ','|')).draw()
                // }
                // console.log(startD);
                // console.log(endD);
                dyntable_Stats.draw();
            })

            var detailRows = [];
            $('#dyntable_Stats').on('click', 'tbody tr td.details-control, tfoot tr th.details-control', function () {
                var td = $(this);
                var type = td.attr("class");
                var tr = td.closest('tr');
                var idx = $.inArray(tr.attr('id'), detailRows);

                if (type.includes("total")) {
                    var row = tr;
                    if (row.parent().find("tr .div-details").size() > 0) {
                        td.removeClass('details');
                        row.parent().find("tr .div-details").parents("tr").remove();

                        // Remove from the 'open' array
                        detailRows.splice(idx, 1);
                    }
                    else {
                        td.addClass('details');
                        var tr = $("<tr><td colspan='13'></td></tr>");
                        tr.find("td").append(format(row.data(), type));
                        row.parent().append(tr);

                        // Add to the 'open' array
                        if (idx === -1) {
                            detailRows.push(tr.attr('id'));
                        }
                    }
                } else {
                    var row = dyntable_Stats.row(tr);
                    if (row.child.isShown()) {
                        td.removeClass('details');
                        row.child.hide();

                        // Remove from the 'open' array
                        detailRows.splice(idx, 1);
                    }
                    else {
                        td.addClass('details');
                        row.child(format(row.data(), type)).show();

                        // Add to the 'open' array
                        if (idx === -1) {
                            detailRows.push(tr.attr('id'));
                        }
                    }
                }
            });
            $('#dyntable_Stats').on('keyup', 'tbody tr td.details-control, tfoot tr th.details-control', function (event){
                if(event.keyCode == 13){
                    $(this).click();
                }
            });

            // On each draw, loop over the `detailRows` array and show any child rows
            dyntable_Stats.on('draw', function () {
                $.each(detailRows, function (i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });
            function format(d, type) {

                var infoT = type.replace(" details-control", "").trim();
                infoT = infoT.replace("details-control ", "").trim();
                var dates = {};
                if (infoT.includes("total")) {
                    infoT = infoT.replace("total ", "").trim();
                    infoT = infoT.replace("total", "").trim();
                    infoT += "_total";
                    dates.startD = startD;
                    dates.endD = endD;
                    var trId="totals";
                    var is_total ="yes";
                } else {
                    dates.startD = startD;
                    dates.endD = endD;
                    var trId=d.dt_RowId;
                    var is_total ="no";
                }
                console.log('-----'+d.actual_date+'----------------');
                console.log(dates.startD);
                console.log(dates.endD);
                var div = $("<div class='div-details' id='div-details-"+trId+"'></div>").text(langDataTable["sProcessing"]);
                $.ajax({
                    url: '/templates/internals/core_ajax_stats_detail.php',
                    data: {startD: dates.startD, endD: dates.endD, info: infoT,aggregate:$('#aggregate').val(),current_date:d.actual_date,is_total:is_total},
                    dataType: 'json',
                    cache: false,
                    success: function (info) {
                        // Countries
                        // TODO: write case statements to display translatable child row name based on infoT
                        var filterCountry='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="country_filter" id="country_filter-'+trId+'">' +
                            '<option>All</option>';
                        var countryLi='';
                        var f = "<div align='center'><h4>"+infoT+"</h4></div><ul class='col-sm-2 countries-r'><h4>" + trans.custom_country + "</h4>";
                        for (var g = 0; g < info.country.length; g++) {
                            var data = info.country[g];
                            if (data.n == null || data.n.length === 0)
                                data.n = "N/A";
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            countryLi += "<li><img border=\"0\" src=\"/images/geo_flags/" + data.n.toLowerCase() + ".png\" class=\"geo_flag\"/> " + data.n + ": " + data.v + "</li>"
                            filterCountry += "<option>" + data.n + "</option>";
                        }
                        filterCountry += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterCountry;
                        f += countryLi;
                        f += "</ul>"
                        //SubId
                        var filterSubId='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="sub_id_filter" id="sub_id_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var subIdLi='';
                        f += "<ul class='col-sm-2 sub_id-r'><h4>Sub ID</h4>";
                        for (var g = 0; g < info.sub_id.length; g++) {
                            var data = info.sub_id[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            subIdLi += "<li>" + data.n + ": " + data.v + "</li>"
                            filterSubId += "<option>" + data.n + "</option>"
                        }
                        filterSubId += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterSubId;
                        f += subIdLi;
                        f += "</ul>"
                        //Tid1
                        var filterTid1='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid1_filter" id="tid1_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid1Li='';
                        f += "<ul class='col-sm-2 tid1-r'><h4>" + trans.custom_tracking_id_one + "</h4>";
                        for (var g = 0; g < info.tid1.length; g++) {
                            var data = info.tid1[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid1Li += "<li>" + data.n + ": " + data.v + "</li>"
                            filterTid1 += "<option>" + data.n + "</option>"
                        }
                        filterTid1 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid1;
                        f += tid1Li;
                        f += "</ul>"
                        //Tid2
                        var filterTid2='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid2_filter" id="tid2_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid2Li='';
                        f += "<ul class='col-sm-2 tid2-r'><h4>" + trans.custom_tracking_id_two + "</h4>";
                        for (var g = 0; g < info.tid2.length; g++) {
                            var data = info.tid2[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid2Li += "<li>" + data.n + ": " + data.v + "</li>"
                            filterTid2 += "<option>" + data.n + "</option>"
                        }
                        filterTid2 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid2;
                        f += tid2Li;
                        f += "</ul>"
                        //Tid3
                        var filterTid3='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid3_filter" id="tid3_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid3Li='';
                        f += "<ul class='col-sm-2 tid3-r'><h4>" + trans.custom_tracking_id_three + "</h4>";
                        for (var g = 0; g < info.tid3.length; g++) {
                            var data = info.tid3[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid3Li += "<li>" + data.n + ": " + data.v + "</li>"
                            filterTid3 += "<option>" + data.n + "</option>"
                        }
                        filterTid3 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid3;
                        f += tid3Li;
                        f += "</ul>"
                        // Tid4
                        var filterTid4='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid4_filter" id="tid4_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid4Li='';
                        f += "<ul class='col-sm-2 tid4-r'><h4>" + trans.custom_tracking_id_four + "</h4>";
                        for (var g = 0; g < info.tid4.length; g++) {
                            var data = info.tid4[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid4Li += "<li>" + data.n + ": " + data.v + "</li>"
                            filterTid4 += "<option>" + data.n + "</option>"
                        }
                        filterTid4 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid4;
                        f += tid4Li;
                        f += "</ul><br><div class='clearfix'></div>";
                        // Tid combinations
                        var filterCombinations='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="combinations_filter" id="combinations_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var combinationsLi='';
                        f += "<ul class='col-sm-5 tidcombinations-r'><h4>" + trans.custom_tracking_ids_combinations + "</h4>";
                        for (var g = 0; g < info.combinations.length; g++) {
                            var data = info.combinations[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            combinationsLi += "<li>" + data.n + ": " + data.v + "</li>"
                            filterCombinations += "<option>" + data.n + "</option>"
                        }
                        filterCombinations += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterCombinations;
                        f += combinationsLi;
                        f += "</ul>"

                        // Tools
                        var filterTools='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tools_filter" id="tools_filter-'+trId+'" >' +
                            '<option value="All">All</option>';
                        var toolsLi='';
                        f += "<ul class='col-sm-3 offer-r'><h4>Smart Tools</h4>";
                        for (var g = 0; g < info.smart_tools.length; g++){
                            var data = info.smart_tools[g];

                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            toolsLi += "<li>" + data.n + ": " + data.v + "</li>"
                            filterTools += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        filterTools += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTools;
                        f += toolsLi;0
                        f += "</ul>"

                        // Offer
                        var filterOffer='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="offer_filter" id="offer_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var offerLi='';
                        f += "<ul class='col-sm-4 offer-r'><h4>Offer Tools</h4>";
                        for (var g = 0; g < info.offer_tools.length; g++){
                            var data = info.offer_tools[g];

                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            offerLi += "<li>" + data.n + ": " + data.v + "</li>"
                            filterOffer += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        filterOffer += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterOffer;
                        f += offerLi;
                        f += "</ul>"


                        var resu = $(f);
                        div.html(resu);
                    }
                });
                return div;
            }
        }
    } )

// stats table DataTables end //

    if ($('#dyntable_payment_Tier').length > 0) {
        $('#dyntable_payment_Tier').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_tier.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": false,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });

        $('#dyntable_payment_Tier').on('click', '.load_more', function () {
            var th = $(this);
            var space = th.data('space');
            var parent = th.data('parent');
            var page_now = th.data('page_now');
            var token = th.data('token');
            //var str = 'Space: ' + space + ', Parent: ' + parent + ', Page Now: ' + page_now;
            var data = {
                'space': space,
                'parent': parent,
                'page_now': page_now,
                'csrf_token': token
            };
            th.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
            //call ajax
            $.ajax({
                url: "templates/internals/core_tier_getchild.php",
                data: data,
                method: "POST",
                dataType: "json"
            }).error(function (err) {
                console.log(err);

            }).done(function () {
                th.html('<i class="fa fa-plus" aria-hidden="true"></i>');
            }).success(function (response) {

                if (response.success) {
                    if (response.output && response.output != '') {
                        th.closest("tr").after(response.output);
                    }
                }

                if (response.end && response.end == 1) {
                    th.hide();
                } else {

                    if (response.page_now) {
                        th.data('page_now', response.page_now);
                    }

                    if (response.space) {
                        th.data('space', response.space);
                    }
                }

            }, 'json');


        });

    }
    if ($('#dyntable_Pending_Debits').length > 0) {
        $('#dyntable_Pending_Debits').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_Pending_Debit.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }
});
function statChildFilter(trId, startD, endD, infoT, current_date,is_total){
    var trans = JSON.parse($("#trans").val());
    var country=$('#country_filter-'+trId).val();
    var subId=$('#sub_id_filter-'+trId).val();
    var tId1=$('#tid1_filter-'+trId).val();
    var tId2=$('#tid2_filter-'+trId).val();
    var tId3=$('#tid3_filter-'+trId).val();
    var tId4=$('#tid4_filter-'+trId).val();
    var combinations=$('#combinations_filter-'+trId).val();
    var smartTools=$('#tools_filter-'+trId).val();
    var offerTools=$('#offer_filter-'+trId).val();
    var dates = {};
    console.log(offerTools);
    console.log(smartTools);
    dates.startD = startD;
    dates.endD = endD;
    $.ajax({
        url: '/templates/internals/core_ajax_stats_detail.php',
        data: {startD: dates.startD, endD: dates.endD,current_date:current_date,is_total:is_total, info: infoT, country: country, subId: subId, tId1: tId1, tId2: tId2, tId3: tId3, tId4: tId4, combinations: combinations, smartTools: smartTools, offerTools: offerTools,aggregate:$('#aggregate').val()},
        dataType: 'json',
        cache: false,
        success: function (info) {
            // Countries
            // TODO: write case statements to display translatable child row name based on infoT
            var filterCountry='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="country_filter" id="country_filter-'+trId+'">';
            var countryLi='';
            var f = "<div align='center'><h4>"+infoT+"</h4></div><ul class='col-sm-2 countries-r'><h4>" + trans.custom_country + "</h4>";
            for (var g = 0; g < info.country.length; g++) {
                var data = info.country[g];
                if (data.n == null || data.n.length === 0)
                    data.n = "N/A";
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                countryLi += "<li><img border=\"0\" src=\"/images/geo_flags/" + data.n.toLowerCase() + ".png\" class=\"geo_flag\"/> " + data.n + ": " + data.v + "</li>"
            }
            filterCountry += '</select><br><br>';
            f += filterCountry;
            f += countryLi;
            f += "</ul>"
            //SubId
            var filterSubId='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="sub_id_filter" id="sub_id_filter-'+trId+'" >';
            '<option>All</option>';
            var subIdLi='';
            f += "<ul class='col-sm-2 sub_id-r'><h4>Sub ID</h4>";
            for (var g = 0; g < info.sub_id.length; g++) {
                var data = info.sub_id[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                subIdLi += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterSubId += '</select><br><br>';
            f += filterSubId;
            f += subIdLi;
            f += "</ul>"
            //Tid1
            var filterTid1='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid1_filter" id="tid1_filter-'+trId+'" >';
            '<option>All</option>';
            var tid1Li='';
            f += "<ul class='col-sm-2 tid1-r'><h4>" + trans.custom_tracking_id_one + "</h4>";
            for (var g = 0; g < info.tid1.length; g++) {
                var data = info.tid1[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid1Li += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterTid1 += '</select><br><br>';
            f += filterTid1;
            f += tid1Li;
            f += "</ul>"
            //Tid2
            var filterTid2='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid2_filter" id="tid2_filter-'+trId+'" >';
            '<option>All</option>';
            var tid2Li='';
            f += "<ul class='col-sm-2 tid2-r'><h4>" + trans.custom_tracking_id_two + "</h4>";
            for (var g = 0; g < info.tid2.length; g++) {
                var data = info.tid2[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid2Li += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterTid2 += '</select><br><br>';
            f += filterTid2;
            f += tid2Li;
            f += "</ul>"
            //Tid3
            var filterTid3='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid3_filter" id="tid3_filter-'+trId+'" >';
            '<option>All</option>';
            var tid3Li='';
            f += "<ul class='col-sm-2 tid3-r'><h4>" + trans.custom_tracking_id_three + "</h4>";
            for (var g = 0; g < info.tid3.length; g++) {
                var data = info.tid3[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid3Li += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterTid3 += '</select><br><br>';
            f += filterTid3;
            f += tid3Li;
            f += "</ul>"
            // Tid4
            var filterTid4='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid4_filter" id="tid4_filter-'+trId+'" >';
            '<option>All</option>';
            var tid4Li='';
            f += "<ul class='col-sm-2 tid4-r'><h4>" + trans.custom_tracking_id_four + "</h4>";
            for (var g = 0; g < info.tid4.length; g++) {
                var data = info.tid4[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid4Li += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterTid4 += '</select><br><br>';
            f += filterTid4;
            f += tid4Li;
            f += "</ul><br><div class='clearfix'></div>";
            // Tid combinations
            var filterCombinations='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="combinations_filter" id="combinations_filter-'+trId+'" >';
            '<option>All</option>';
            var combinationsLi='';
            f += "<ul class='col-sm-5 tidcombinations-r'><h4>" + trans.custom_tracking_ids_combinations + "</h4>";
            for (var g = 0; g < info.combinations.length; g++) {
                var data = info.combinations[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                combinationsLi += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterCombinations += '</select><br><br>';
            f += filterCombinations;
            f += combinationsLi;
            f += "</ul>"
            // Tools
            var filterTools='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tools_filter" id="tools_filter-'+trId+'" >';
            '<option value="All">All</option>';
            var toolsLi='';
            f += "<ul class='col-sm-3 offer-r'><h4>Smart Tools</h4>";

            for (var g = 0; g < info.smart_tools.length; g++){
                var data = info.smart_tools[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                toolsLi += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterTools += '</select><br><br>';
            f += filterTools;
            f += toolsLi;
            f += "</ul>"
            // Offer
            var filterOffer='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="offer_filter" id="offer_filter-'+trId+'" >';
            '<option>All</option>';
            var offerLi='';
            f += "<ul class='col-sm-4 offer-r'><h4>Offer Tools</h4>";
            for (var g = 0; g < info.offer_tools.length; g++){
                var data = info.offer_tools[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                offerLi += "<li>" + data.n + ": " + data.v + "</li>"
            }
            filterOffer += '</select><br><br>';
            f += filterOffer;
            f += offerLi;
            f += "</ul>"
            var resu = $(f);
            $("#div-details-"+trId).html(resu);
        },
        complete: function () {
            $.ajax({
                url: '/templates/internals/core_ajax_stats_details_filters.php',
                data: {startD: dates.startD, endD: dates.endD,current_date:current_date,is_total:is_total, info: infoT, country: country, subId: subId, tId1: tId1, tId2: tId2, tId3: tId3, tId4: tId4, combinations: combinations, smartTools: smartTools, offerTools: offerTools,aggregate:$('#aggregate').val()},
                dataType: 'json',
                cache: false,
                success: function (info) {
                    // Countries
                    // TODO: write case statements to display translatable child row name based on infoT
                    var filterCountry= '<option value="All">All</option>';
                    for (var g = 0; g < info.country.length; g++) {
                        var data = info.country[g];
                        if (data.n == null || data.n.length === 0)
                            data.n = "N/A";
                        if(data.n == country){
                            filterCountry += "<option selected>" + data.n + "</option>";
                        }
                        else {
                            filterCountry += "<option>" + data.n + "</option>";
                        }
                    }
                    $('#country_filter-'+trId).html(filterCountry);

                    //SubId
                    var filterSubId='<option value="All">All</option>';
                    for (var g = 0; g < info.sub_id.length; g++) {
                        var data = info.sub_id[g];
                        if(data.n == subId){
                            filterSubId += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterSubId += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#sub_id_filter-'+trId).html(filterSubId);

                    //Tid1
                    var filterTid1='<option value="All">All</option>';
                    for (var g = 0; g < info.tid1.length; g++) {
                        var data = info.tid1[g];
                        if(data.n == tId1){
                            filterTid1 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid1 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid1_filter-'+trId).html(filterTid1);

                    //Tid2
                    var filterTid2='<option value="All">All</option>';
                    for (var g = 0; g < info.tid2.length; g++) {
                        var data = info.tid2[g];
                        if(data.n == tId2){
                            filterTid2 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid2 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid2_filter-'+trId).html(filterTid2);

                    //Tid3
                    var filterTid3='<option value="All">All</option>';
                    for (var g = 0; g < info.tid3.length; g++) {
                        var data = info.tid3[g];
                        if(data.n == tId3){
                            filterTid3 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid3 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid3_filter-'+trId).html(filterTid3);

                    // Tid4
                    var filterTid4='<option value="All">All</option>';
                    for (var g = 0; g < info.tid4.length; g++) {
                        var data = info.tid4[g];
                        if(data.n == tId4){
                            filterTid4 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid4 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid4_filter-'+trId).html(filterTid4);

                    // Tid combinations
                    var filterCombinations='<option value="All">All</option>';
                    for (var g = 0; g < info.combinations.length; g++) {
                        var data = info.combinations[g];
                        if(data.n == combinations){
                            filterCombinations += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterCombinations += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#combinations_filter-'+trId).html(filterCombinations);

                    // Tools
                    var filterTools='<option value="All">All</option>';
                    for (var g = 0; g < info.smart_tools.length; g++){
                        var data = info.smart_tools[g];
                        var st=data.src1+" "+data.src2;
                        if(st == smartTools){
                            filterTools += "<option selected value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        else{
                            filterTools += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                    }
                    $('#tools_filter-'+trId).html(filterTools);

                    // Offer
                    var filterOffer='<option value="All">All</option>';
                    for (var g = 0; g < info.offer_tools.length; g++){
                        var data = info.offer_tools[g];
                        var ot=data.src1+" "+data.src2;
                        if(ot == offerTools){
                            filterOffer += "<option selected value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        else{
                            filterOffer += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                    }
                    $('#offer_filter-'+trId).html(filterOffer);
                    $('.js-example-basic-single').select2();
                },
            });
        }
    });
}
function filterByLand(offerId){
    var land=$('#landSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_links.php?id=' + offerId+'&land='+land,
        dataType: 'json',
        success: function (resp) {
            var html = ''
            $.each(resp.link,function (idx,data) {
                html += ('<div class="portlet banner-port" style="border-color: #20003F;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="Running Link: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                else{
                    html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                html +=('               </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                            $("#add_parameters-'+offerId+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+offerId+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+offerId+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+offerId+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+offerId+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+offerId+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                $.each(resp.banners,function (idx,data) {
                    html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal='<a href="'+data.lnk+' \'+ params_text+\' " target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                    html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                    html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal2=''+data.lnk+'\'+ params_text+\'';
                    html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                });
                html+= ('}); \
                        });</script>')
            });
            $('#linksContainer'+offerId).html(html);
        }
    });
}
function filterLinks(offerId,filterType){
    // alert(filterType);
    var land=$('#landSelect'+offerId).val();
    var country=$('#linkCountriesSelect'+offerId).val();
    var linktext=$('#linktextSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_links.php?id=' + offerId+'&land='+land+'&country='+country+'&linktext='+linktext+'&changedOption='+filterType,
        dataType: 'json',
        success: function (resp) {
            var html = ''
            if(resp.countries.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.countries, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                // $('#linkCountriesSelect'+offerId).show();
                // $('#linkCountriesLabel'+offerId).show();
                $('#linkCountriesSelect'+offerId).html(lOptions);
            }
            else if (filterType != "countryChanged"){
                // $('#linkCountriesSelect'+offerId).hide();
                // $('#linkCountriesLabel'+offerId).hide();
                // $('#linkCountriesSelect'+offerId).val("");
            }
            if(resp.linktext.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.linktext, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                // $('#linktextSelect'+offerId).show();
                // $('#linktextLabel'+offerId).show();
                $('#linktextSelect'+offerId).html(lOptions);
            }
            else if (filterType != "linktextChanged"){
                // $('#linktextSelect'+offerId).hide();
                // $('#linktextLabel'+offerId).hide();
                // $('#linktextSelect'+offerId).val("");
            }
            $.each(resp.link,function (idx,data) {
                html += ('<div class="portlet banner-port" style="border-color: #20003F;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="Running Link: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                else{
                    html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                html +=('               </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                            $("#add_parameters-'+offerId+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+offerId+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+offerId+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+offerId+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+offerId+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+offerId+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                $.each(resp.banners,function (idx,data) {
                    html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal='<a href="'+data.lnk+' \'+ params_text+\' " target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                    html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                    html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal2=''+data.lnk+'\'+ params_text+\'';
                    html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                });
                html+= ('}); \
                        });</script>')
            });
            $('#linksContainer'+offerId).html(html);
        }
    });
}
function filterBanners(offerId,changedOption){
    var description=$('#descriptionSelect'+offerId).val();
    var size1=$('#size1Select'+offerId).val();
    var size2=$('#size2Select'+offerId).val();
    var language=$('#languageSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_banners.php?id=' + offerId+'&size1='+size1+'&size2='+size2+'&language='+language+'&description='+description+'&changedOption='+changedOption,
        dataType: 'json',
        success: function (resp) {
            var html = '';
            if(resp.language.length > 1){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.language, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                $('#languageSelect'+offerId).html(lOptions);
                $('#languageSelect'+offerId).show();
                $('#languageLabel'+offerId).show();
            }
            else if (changedOption != "languageChanged"){
                $('#languageSelect'+offerId).hide();
                $('#languageLabel'+offerId).hide();
                $('#languageSelect'+offerId).val("");
            }
            if(resp.description.length > 1){
                var descriptionOptions="";
                descriptionOptions += '<option value="" selected>All</option>';
                $.each(resp.description, function (idx, l) {
                    if(l != ""){
                        descriptionOptions += '<option>' + l + '</option>';
                    }
                });
                $('#descriptionSelect'+offerId).html(descriptionOptions);
                $('#descriptionSelect'+offerId).show();
                $('#descriptionLabel'+offerId).show();
            }
            else if (changedOption != "descriptionChanged"){
                $('#descriptionSelect'+offerId).hide();
                $('#descriptionLabel'+offerId).hide();
                $('#descriptionSelect'+offerId).val("");
            }
            if(resp.size1.length > 1){
                var size1Options="";
                size1Options += '<option value="" selected>All</option>';
                $.each(resp.size1, function (idx, l) {
                    if(l != ""){
                        size1Options += '<option>' + l + '</option>';
                    }
                });
                $('#size1Select'+offerId).html(size1Options);
                $('#size1Select'+offerId).show();
                $('#size1Label'+offerId).show();
            }
            else if (changedOption != "size1Changed"){
                $('#size1Select'+offerId).hide();
                $('#size1Label'+offerId).hide();
                $('#size1Select'+offerId).val("");
            }
            if(resp.size2.length > 1){
                var size2Options="";
                size2Options += '<option value="" selected>All</option>';
                $.each(resp.size2, function (idx, l) {
                    if(l != ""){
                        size2Options += '<option>' + l + '</option>';
                    }
                });
                $('#size2Select'+offerId).html(size2Options);
                $('#size2Select'+offerId).show();
                $('#size2Label'+offerId).show();
            }
            else if (changedOption != "size2Changed"){
                $('#size2Select'+offerId).hide();
                $('#size2Label'+offerId).hide();
                $('#size2Select'+offerId).val("");
            }
            $.each(resp.banners,function (idx,data) {
                html += '<div class="portlet banner-port" style="border-color: #20003F;">'
                html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">'
                html += '<div class="portlet-title">'
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_banners.indexOf(data.number) >= 0) {
                            var running='<span class="badge running" title="Running Banner: Raw Visits from you in the last 7 days ≥ 1"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html += ('<h4><span class="label label-success">HOT</span> '+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') '+running+'<span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }else{
                    html += ('<h4>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }
                html += '</div>'
                html += '</div>'
                html += '<div class="portlet-body">'
                html += '<ul class="list-group">'
                html += '<li class="list-group-item">'
                html += '<label style="width:100%">'
                html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                html += '<br/><br/> <i class="fas fa-code fa-fw"></i> '+jstext.language.marketing_source_code
                html += '</label>'
                html += '<br/>'
                html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                html += '</textarea>'
                html += '<br/>'
                html +=('<label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> <textarea style="font-weight:normal !improtant;" id="banner-direct-link-'+data.grp+'-'+data.number+'" rows="1" class="form-control">'+data.lnk+'</textarea>')
                html += '<br/>'
                html += '<a href="//static.sublimerevenue.com/'+data.image+'" download><button class="btn btn-primary"><i class="fa fa-download"></i> '+jstext.language.custom_download+'</button></a>'
                html += '</li>'
                html += '</ul>'
                html += '</div>'
                html += '</div>'
                html += ('<script>$(document).ready(function () { \
                            $("#embed-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                        })</script>')
                html += ('<script>$(document).ready(function () { \
                            $("#banner-direct-link-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'\\n'+jstext.language.custom_good_luck+'"); \
                            }); \
                        })</script>')
            });
            $('#bannersContainer'+offerId).html(html);
        }
    });
}