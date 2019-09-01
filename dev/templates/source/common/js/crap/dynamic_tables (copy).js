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
            var offerstbl = $('#dyntable_Offers').DataTable({
                "dom":  "<'row'<'col-sm-12 col-md-6'Bl><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "buttons":[{
                    "extend": "colvis",
                    "columns": ":gt(0)"
                }],
                "searchHighlight"   : true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/templates/internals/core_ajax_offers.php",
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
                "bDeferRender": true,
                "aoColumnDefs": [
                    {"type":"html-num-fmt","targets":[9]}, // make it sort in /templates/internals/core_ajax_offers.php
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
                                    <strong class="subtitle">'+jstext.language.custom_restrictions+':</strong> '+resp.data.restrictions+'<br />\
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
                                                <input class="tid select-selected" type="text" id="sub_id-'+d[10]+'" maxlength="25"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 1:</label> \
                                                <input class="tid select-selected" type="text" id="tid-1-'+d[10]+'" maxlength="25"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 2:</label> \
                                                <input class="tid select-selected" type="text" id="tid-2-'+d[10]+'" maxlength="25"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 3:</label> \
                                                <input class="tid select-selected" type="text" id="tid-3-'+d[10]+'" maxlength="25"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <label class="trackings">'+jstext.language.custom_tracking_id+' 4:</label> \
                                                <input class="tid select-selected" type="text" id="tid-4-'+d[10]+'" maxlength="25"> \
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
                            html += '<div class="row"><h4 style="text-align:center;">'+jstext.language.custom_links+'</h4><div class="col-md-4"><label>'+jstext.language.custom_filter_by_landing+'</label>' +
                                '<select class="form-control" id="landSelect'+d[10]+'" onchange="filterByLand(' + d[10] + ');">' +
                                '<option value="" selected>'+jstext.language.custom_all+'</option>' +
                                '<option value="1">'+jstext.language.custom_landing+'</option>' +
                                '<option value="0">'+jstext.language.custom_pre_landing+'</option>' +
                                '</select></div></div>';
                        }
                        html += '<div id="linksContainer'+d[10]+'">';
                        $.each(resp.link,function (idx,data) {
                            html += ('<div class="portlet banner-port" style="border-color: #20003F;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                            var epc=data.earnings / data.hits * 100;
                            if(epc >= 0.05){
                                html+=' <i class="fa fa-link fa-fw"></i> <span class="label label-success">HOT</span> '+data.linktext+' <span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            else{
                                html+=' <i class="fa fa-link fa-fw"></i> '+data.linktext+' <span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            html +=('     </h4> \
                                    </div> \
                                        <div class="portlet-body"><label>'+jstext.language.marketing_target_url+':</label> \
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
                            });
                            html+= ('}); \
                        });</script>')
                        });
                        html += '</div>';
                        if(resp.banners.length > 0) {
                            html += '<h4 style="text-align:center;">'+jstext.language.custom_banners+'</h4><div class="row">'
                            html += '<div class="col-md-3"><label>'+jstext.language.custom_filter_by_banner_set+'</label>';
                            html += '<select class="form-control" id="descriptionSelect'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'descriptionChanged\')">';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            $.each(resp.description, function (idx, l) {
                                if(l != ""){
                                    html += '<option>' + l + '</option>';
                                }
                            });
                            html += '</select></div>';
                            html += '<div class="col-md-3"><label>'+jstext.language.custom_filter_by_width+'</label>';
                            html += '<select class="form-control" id="size1Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size1Changed\')">';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            $.each(resp.size1, function (idx, s1) {
                                html += '<option>' + s1 + '</option>';
                            });
                            html += '</select></div>';
                            html += '<div class="col-md-3"><label>'+jstext.language.custom_filter_by_height+'</label>';
                            html += '<select class="form-control" id="size2Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size2Changed\')">';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            $.each(resp.size2, function (idx, s2) {
                                html += '<option>' + s2 + '</option>';
                            });
                            html += '</select></div>';
                            html += '<div class="col-md-3"><label>'+jstext.language.custom_filter_by_language+'</label>';
                            html += '<select class="form-control" id="languageSelect'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'languageChanged\')">';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            $.each(resp.language, function (idx, l) {
                                if(l != ""){
                                    html += '<option>' + l + '</option>';
                                }
                            });
                            html += '</select></div></div>';
                        }
                        html += '<div id="bannersContainer'+d[10]+'">';
                        $.each(resp.banners,function (idx,data) {
                            html += '<div class="portlet banner-port" style="border-color: #20003F;">'
                            html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">'
                            html += '<div class="portlet-title">'
                            var epc=data.earnings / data.hits * 100;
                            if(epc >= 0.05){
                                html += ('<h4><i class="fa fa-image fa-fw"></i> <span class="label label-success">HOT</span>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            else{
                                html += ('<h4><i class="fa fa-image fa-fw"></i>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="portlet-body">'
                            html += '<ul class="list-group">'
                            html += '<li class="list-group-item">'
                            html += '<label style="width:100%">'
                            html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                            html += '<br/><br/> '+jstext.language.marketing_source_code
                            html += '</label>'
                            html += '<br/>'
                            html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                            html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                            html += '</textarea>'
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
                        });
                        html += '</div>';
                        $('#row-details-' + d[10]).html(html)
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
                    "data": function (d) {
                        d.startD = moment().format("YYYY-MM-DD")
                        d.endD = moment().format("YYYY-MM-DD")
                        d.aggregate = $('#aggregate').val()
                        d.pages = 10
                    },
                    "error": function () {
                        window.location.reload();
                    }
                },
                "bDeferRender": true,
                "dom": "<'row'<'col-sm-6 col-sm-offset-6 text-right'l>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "columns": [
                    {"data": "date_", "className": "date-column"},
                    {"data": "raw_visits", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "details-control raw_visits",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
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
                    {"data": "rpm", render: $.fn.dataTable.render.number(',', '.', 2, '',' €')},
                    {
                        "class": "details-control rpm",
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
                            (totalTransactions / totalUnique * 100).toFixed(3) + "%"
                        );
                    }
                    if (totalUnique === 0) {
                        $(api.column(9).footer()).html(
                            (0).toFixed(2) + " €"
                        );
                    } else {
                        $(api.column(9).footer()).html(
                            (totalEarnings / totalUnique * 1000).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €"
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
             make it work only for row1
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
            // $('#aggregate').on('change',function () {
            //     if ($(this).val() == 'monthly') {
            //         $('#range').data('daterangepicker').setStartDate(moment().subtract(1,'months').format('YYYY-MM-DD'))
            //         dyntable_Stats.columns(0).search($('#range').val().replace(' - ','|')).draw()
            //     } else if ($(this).val() == 'yearly') {
            //         $('#range').data('daterangepicker').setStartDate(moment().subtract(1,'years').format('YYYY-MM-DD'))
            //         dyntable_Stats.columns(0).search($('#range').val().replace(' - ','|')).draw()
            //     } else {
            //         $('#range').data('daterangepicker').setStartDate(moment().format('YYYY-MM-DD'))
            //         dyntable_Stats.columns(0).search($('#range').val().replace(' - ','|')).draw()
            //     }
            // })

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


            // On each draw, loop over the `detailRows` array and show any child rows
            dyntable_Stats.on('draw', function () {
                $.each(detailRows, function (i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });
            function format(d, type) {
                var infoT = type.replace("details-control ", "").trim();
                var dates = {};
                if (infoT.includes("total")) {
                    infoT = infoT.replace("total ", "").trim();
                    infoT += "_total";
                    dates.startD = startD;
                    dates.endD = endD;
                } else {
                    dates.startD = d.date_;
                    dates.endD = d.date_;
                }
                var div = $("<div class='div-details'></div>").text(langDataTable["sProcessing"]);
                $.ajax({
                    url: '/templates/internals/core_ajax_stats_detail.php',
                    data: {startD: dates.startD, endD: dates.endD, info: infoT},
                    dataType: 'json',
                    cache: false,
                    success: function (info) {
                        // Countries
                        // TODO: write case statements to display translatable child row name based on infoT
                        var f = "<div align='center'><h4>"+infoT+"</h4></div><ul class='col-sm-4 countries-r'><h4>" + trans.custom_country + "</h4><br>";
                        for (var g = 0; g < info.country.length; g++) {
                            var data = info.country[g];
                            if (data.n === "-")
                                data.n = "N/A";
                            if (data.n === "XX")
                                data.n = "N/A";
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li><img border=\"0\" src=\"/images/geo_flags/" + data.n.toLowerCase() + ".png\" class=\"geo_flag\"/> " + data.n + ": " + data.v + "</li>"
                        }
                        f += "</ul>"
                        //Tid1
                        f += "<ul class='col-sm-2 tid1-r'><h4>" + trans.custom_tracking_id_one + "</h4><br>";
                        for (var g = 0; g < info.tid1.length; g++) {
                            var data = info.tid1[g];
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li>" + data.n + ": " + data.v + "</li>"
                        }
                        f += "</ul>"
                        //Tid2
                        f += "<ul class='col-sm-2 tid2-r'><h4>" + trans.custom_tracking_id_two + "</h4><br>";
                        for (var g = 0; g < info.tid2.length; g++) {
                            var data = info.tid2[g];
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li>" + data.n + ": " + data.v + "</li>"
                        }
                        f += "</ul>"
                        //Tid3
                        f += "<ul class='col-sm-2 tid3-r'><h4>" + trans.custom_tracking_id_three + "</h4><br>";
                        for (var g = 0; g < info.tid3.length; g++) {
                            var data = info.tid3[g];
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li>" + data.n + ": " + data.v + "</li>"
                        }
                        f += "</ul>"
                        // Tid4
                        f += "<ul class='col-sm-2 tid4-r'><h4>" + trans.custom_tracking_id_four + "</h4><br>";
                        for (var g = 0; g < info.tid4.length; g++) {
                            var data = info.tid4[g];
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li>" + data.n + ": " + data.v + "</li>"
                        }
                        f += "</ul><br>";
                        // Tid combinations
                        f += "<ul class='col-sm-12 tidcombinations-r'><h4>" + trans.custom_tracking_ids_combinations + "</h4><br>";
                        for (var g = 0; g < info.combinations.length; g++) {
                            var data = info.combinations[g];
                            if(parseFloat(data.v).toFixed(2) == 0.00)
                                continue;
                            if(infoT.includes("earnings") || infoT.includes("rpm"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            f += "<li>" + data.n + ": " + data.v + "</li>"
                        }
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
            //console.log(str);
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
                if(epc >= 0.05){
                    html+=' <i class="fa fa-link fa-fw"></i> <span class="label label-success">HOT</span>'+data.linktext+' <span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                else{
                    html+=' <i class="fa fa-link fa-fw"></i>'+data.linktext+' <span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                html +=('     </h4> \
                                    </div> \
                                        <div class="portlet-body"><label>'+jstext.language.marketing_target_url+':</label> \
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
            if(resp.language.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.language, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                $('#languageSelect'+offerId).html(lOptions);
            }
            if(resp.description.length > 0){
                var descriptionOptions="";
                descriptionOptions += '<option value="" selected>All</option>';
                $.each(resp.description, function (idx, l) {
                    if(l != ""){
                        descriptionOptions += '<option>' + l + '</option>';
                    }
                });
                $('#descriptionSelect'+offerId).html(descriptionOptions);
            }
            if(resp.size1.length > 0){
                var size1Options="";
                size1Options += '<option value="" selected>All</option>';
                $.each(resp.size1, function (idx, l) {
                    if(l != ""){
                        size1Options += '<option>' + l + '</option>';
                    }
                });
                $('#size1Select'+offerId).html(size1Options);
            }
            if(resp.size2.length > 0){
                var size2Options="";
                size2Options += '<option value="" selected>All</option>';
                $.each(resp.size2, function (idx, l) {
                    if(l != ""){
                        size2Options += '<option>' + l + '</option>';
                    }
                });
                $('#size2Select'+offerId).html(size2Options);
            }
            $.each(resp.banners,function (idx,data) {
                // TODO: html form select option description from idevaff_banners table to distunguish banner sets 
                html += '<div class="portlet banner-port" style="border-color: #20003F;">'
                html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;">'
                html += '<div class="portlet-title">'
                var epc=data.earnings / data.hits * 100;
                if(epc >= 0.05){
                    html += ('<h4><i class="fa fa-image fa-fw"></i> <span class="label label-success">HOT</span>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }else{
                    html += ('<h4><i class="fa fa-image fa-fw"></i>'+resp.data.name+' '+data.description+' '+data.size1+' x '+data.size2+' ('+data.language+') <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }
                html += '</div>'
                html += '</div>'
                html += '<div class="portlet-body">'
                html += '<ul class="list-group">'
                html += '<li class="list-group-item">'
                html += '<label style="width:100%">'
                html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                html += '<br/><br/> '+jstext.language.marketing_source_code
                html += '</label>'
                html += '<br/>'
                html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                html += '</textarea>'
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
            });
            $('#bannersContainer'+offerId).html(html);
        }
    });
}
