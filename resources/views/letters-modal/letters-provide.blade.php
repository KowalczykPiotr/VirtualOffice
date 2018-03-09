<form ng-submit="provideLetter()" class="form-horizontal" role="form">
    <div class="d-flex flex-column tab-modal">

        <div  id="fixModalTable" class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" ng-model="provide.SelectDeselect" id="chSelectProvide" ></th>
                    <th>@lang('letters-modal/letters-provide.col_sender')</th>
                    <th>@lang('letters-modal/letters-provide.col_type')</th>
                    <th>@lang('letters-modal/letters-provide.col_date')</th>
                </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in letters">
                        <td><input type="checkbox" class="provide-all" ng-model="provide.id[item.id]" value="[[item.id]]"></td>
                        <td>[[item.name]]</td>
                        <td>[[item.letter_type.name]]</td>
                        <td>[[item.created_at | asDate | date:'yyyy-MM-dd']]<td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-auto">
            <div class="col-md-12">
                <div ng-if="provide.status == 'OK'"    class="alert alert-success " role="alert">@lang('letters-modal/letters-provide.msg_provideOK')</div>
                <div ng-if="provide.status == 'ERROR'" class="alert alert-danger " role="alert">@lang('letters-modal/letters-provide.msg_provideER')</div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-md-3">
                <button ng-disabled="provide.status != 'OK'" ng-click="printPdf(provide.pdf)" class="btn btn-primary btn-block p-2">
                    <i class="fas fa-print"></i>
                    &nbsp;@lang('letters-modal/letters-provide.btn_print')
                </button>
            </div>

            <div class="col-md-3">
                <button ng-disabled="provide.status == 'WAIT'" type="submit" class="btn btn-primary btn-block p-2">
                    <i class="far fa-share-square"></i>
                    &nbsp;@lang('letters-modal/letters-provide.btn_provide')
                </button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">

    $(document).ready(function() {


        $("#fixModalTable>table").tableHeadFixer();

        $("#chSelectProvide").change(function() {
            if ( $(this).is(':checked') ){

                $( "input:checked.provide-all" ).trigger( "click" );
            }
            $( ".provide-all" ).trigger( "click" );
        });
    });

</script>
