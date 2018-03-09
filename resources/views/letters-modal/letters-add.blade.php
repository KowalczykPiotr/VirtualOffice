<!-- Dodaj -->

<form ng-submit="addLetter()" role="form">
    <div class="d-flex flex-column tab-modal">
        <input type="hidden" ng-model="add.customer_id">
        <div class="form-group row">
            <label for="inputNadawca" class="col-4 control-label">@lang('letters-modal/letters-add.lab_sender')</label>
            <div class="col-8">
                <input required type="text" class="form-control form-control-sm" ng-click="tabDodaj()" ng-model="add.name" placeholder="@lang('letters-modal/letters-add.inp_sender')">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputUserGroup" class="col-4 control-label">@lang('letters-modal/letters-add.lab_type')</label>
            <div class="col-sm-8">
                <select required class="form-control form-control-sm" ng-click="tabDodaj()" ng-model="add.letter_type">
                    <option value="" selected hidden>@lang('letters-modal/letters-add.opt_select')</option>
                    <option ng-repeat="item in letter_type" value="[[item.id]]">[[item.name]]</option>

                </select>
            </div>
        </div>

        <div class="row mt-auto">
            <div class="col-md-12">
                <div ng-if="add.status == 'OK'"    class="alert alert-success " role="alert">@lang('letters-modal/letters-add.msg_addOK')</div>
                <div ng-if="add.status == 'ERROR'" class="alert alert-danger "  role="alert">@lang('letters-modal/letters-add.msg_addERROR')</div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-md-3">
                    <button ng-disabled="add.status == 'WAIT'" id="addLetterBtn" type="submit" class="btn btn-primary btn-block p-2">
                        <i ng-if="add.status == 'IDLE'" class="far fa-envelope"></i>
                        <i ng-if="add.status == 'WAIT'" class="fas fa-spinner fa-pulse"></i>
                       &nbsp;@lang('letters-modal/letters-add.btn_add')
                    </button>
            </div>
        </div>
    </div>
</form>w