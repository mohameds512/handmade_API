@extends('layouts.admin')

@section('content_header')
    <h1>Purchasing</h1>
@stop

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">

            Purchase here

        </div>
    </div>


    <div class="row document-item-body">
        <div class="col-sm-12 p-0" style="table-layout: fixed;">
            <div class="table-responsive overflow-x-scroll overflow-y-hidden">
                <table id="items" class="table" style="table-layout: fixed;">
                    <colgroup>
                        <col class="document-item-40-px">
                        <col class="document-item-25">
                        <col class="document-item-30 description">
                        <col class="document-item-10">
                        <col class="document-item-10">
                        <col class="document-item-20">
                        <col class="document-item-40-px">
                    </colgroup>
                    <thead class="thead-light">
                    <tr>
                        <th class="border-top-0 border-right-0 border-bottom-0" style="max-width: 40px;">
                            <div></div>
                        </th>
                        <th class="text-left border-top-0 border-right-0 border-bottom-0">
                            Items
                        </th>
                        <th class="text-left border-top-0 border-right-0 border-bottom-0"></th>
                        <th class="text-center pl-2 border-top-0 border-right-0 border-bottom-0">
                            Quantity
                        </th>
                        <th class="text-right border-top-0 border-right-0 border-bottom-0 pr-1"
                            style="padding-left: 5px;">
                            Price
                        </th>
                        <th class="text-right border-top-0 border-bottom-0 item-total">
                            Amount
                        </th>
                        <th class="border-top-0 border-right-0 border-bottom-0" style="max-width: 40px;">
                            <div></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="invoice-item-rows" class="table-padding-05">
                    <tr index="0">
                        <td colspan="7" class="border-right-0 border-bottom-0 p-0">
                            <table class="w-100">
                                <colgroup>
                                    <col class="document-item-40-px">
                                    <col class="document-item-25">
                                    <col class="document-item-30 description">
                                    <col class="document-item-10">
                                    <col class="document-item-10">
                                    <col class="document-item-20">
                                    <col class="document-item-40-px">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="pl-3 pb-3 align-middle border-bottom-0 move" style="max-width: 40px;">
                                        <div><i class="fas fa-grip-vertical"></i></div>
                                    </td>
                                    <td class="pb-3 align-middle border-bottom-0 name">
                                        <div><input type="text" name="items.0.name" autocomplete="off"
                                                    required="required" data-item="name" class="form-control"> <!---->
                                        </div>
                                    </td>
                                    <td class="pb-3 border-bottom-0 description"><textarea
                                            placeholder="Enter item description" name="items.0.description"
                                            data-item="description" resize="none" class="form-control"
                                            style="height: 46px; overflow: hidden;"></textarea></td>
                                    <td class="pb-3 pl-0 pr-2 border-bottom-0 quantity">
                                        <div><input type="number" min="0" name="items.0.quantity" autocomplete="off"
                                                    required="required" data-item="quantity"
                                                    class="form-control text-center p-0 input-number-disabled"> <!---->
                                        </div>
                                    </td>
                                    <td class="pb-3 pl-0 pr-0 border-bottom-0 price"
                                        style="padding-right: 5px; padding-left: 5px;">
                                        <div>
                                            <div data-v-18ba1734="" class="required text-right input-price p-0"
                                                 form-classes="[object Object]"><!----> <input data-v-18ba1734=""
                                                                                               type="tel"
                                                                                               class="v-money form-control"
                                                                                               name="price"
                                                                                               placeholder=""> <!---->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right long-texts pb-3 border-bottom-0 total">
                                        <div>
                                            <div data-v-18ba1734=""
                                                 class="required disabled text-right input-price disabled-money"
                                                 form-classes="[object Object]"><!----> <input data-v-18ba1734=""
                                                                                               type="tel"
                                                                                               class="v-money form-control"
                                                                                               name="total"
                                                                                               placeholder=""
                                                                                               disabled="disabled">
                                                <!----></div>
                                        </div>
                                    </td>
                                    <td class="pb-3 pl-2 align-middle border-bottom-0 delete" style="max-width: 40px;">
                                        <div>
                                            <button type="button" class="btn btn-link btn-delete p-0"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-top-0"></td>
                                    <td colspan="4" class="border-top-0 p-0">
                                        <div index="0" class="line-item-area pb-3">
                                            <div class="line-item-content">
                                                <div class="long-texts line-item-text"
                                                     style="float: left; margin-top: 15px; margin-right: 2px; position: absolute; left: -63px;">
                                                    Tax
                                                </div>
                                                <div data-v-62a88c80="" class="form-group mb-0 select-tax"><!---->
                                                    <div class=""><!---->
                                                        <div data-v-62a88c80="" class="el-select"><!---->
                                                            <div class="el-input el-input--prefix el-input--suffix">
                                                                <!----><input type="text" autocomplete="off"
                                                                              placeholder="- Select Tax -"
                                                                              class="el-input__inner"
                                                                              readonly="readonly"><span
                                                                    class="el-input__prefix"><span data-v-62a88c80=""
                                                                                                   class="el-input__suffix-inner el-select-icon"><i
                                                                            data-v-62a88c80=""
                                                                            class="select-icon-position el-input__icon fa fa-"></i></span>
                                                                    <!----></span><span class="el-input__suffix"><span
                                                                        class="el-input__suffix-inner"><i
                                                                            class="el-select__caret el-input__icon el-icon-arrow-up"
                                                                            style=""></i><!----><!----><!----><!---->
                                                                        <!----></span><!----></span><!----><!----></div>
                                                        </div> <!----> <!----> <select data-v-62a88c80=""
                                                                                       name="items.0.taxes.0"
                                                                                       id="items.0.taxes.0"
                                                                                       class="d-none">
                                                            <option data-v-62a88c80="" value="112147">eg (14%)</option>
                                                        </select> <!---->  <!----> <!----></div> <!----></div>
                                            </div>
                                            <div class="line-item-content-right">
                                                <div class="line-item-content-right-price long-texts text-right">
                                                    <div data-v-18ba1734=""
                                                         class="required disabled text-right input-price disabled-money"
                                                         form-classes="[object Object]"><!----> <input
                                                            data-v-18ba1734="" type="tel" class="v-money form-control"
                                                            name="tax" placeholder="" disabled="disabled"> <!----></div>
                                                </div>
                                                <div class="line-item-content-right-delete pl-2">
                                                    <button type="button" class="btn btn-link btn-delete p-0"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line-item-area pb-3">
                                            <div class="line-item-content">
                                                <div class="long-texts line-item-text"
                                                     style="float: left; margin-top: 15px; margin-right: 2px; position: absolute; left: -63px;">
                                                    Tax
                                                </div>
                                                <div data-v-62a88c80="" class="form-group mb-0 select-tax"
                                                     style="margin-left: 1px; margin-right: -2px;"><!---->
                                                    <div class=""><!---->
                                                        <div data-v-62a88c80="" class="el-select"><!---->
                                                            <div class="el-input el-input--prefix el-input--suffix">
                                                                <!----><input type="text" autocomplete="off"
                                                                              placeholder="- Select Tax -"
                                                                              class="el-input__inner"
                                                                              readonly="readonly"><span
                                                                    class="el-input__prefix"><span data-v-62a88c80=""
                                                                                                   class="el-input__suffix-inner el-select-icon"><i
                                                                            data-v-62a88c80=""
                                                                            class="select-icon-position el-input__icon fa fa-"></i></span>
                                                                    <!----></span><span class="el-input__suffix"><span
                                                                        class="el-input__suffix-inner"><i
                                                                            class="el-select__caret el-input__icon el-icon-arrow-up"></i>
                                                                        <!----><!----><!----><!----><!----></span>
                                                                    <!----></span><!----><!----></div>
                                                        </div> <!----> <!----> <select data-v-62a88c80=""
                                                                                       name="items.0.taxes.999"
                                                                                       id="items.0.taxes.999"
                                                                                       class="d-none">
                                                            <option data-v-62a88c80="" value="112147">eg (14%)</option>
                                                        </select> <!---->  <!----> <!----></div> <!----></div>
                                            </div>
                                            <div class="line-item-content-right">
                                                <div class="line-item-content-right-price long-texts text-right">
                                                    <div>
                                                        <div
                                                            class="required disabled text-right input-price disabled-money">
                                                            <input type="tel" name="discount_amount" disabled="disabled"
                                                                   value="__" class="v-money form-control text-right">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="line-item-content-right-delete pl-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr index="1">
                        <td colspan="7" class="border-right-0 border-bottom-0 p-0">
                            <table class="w-100">
                                <colgroup>
                                    <col class="document-item-40-px">
                                    <col class="document-item-25">
                                    <col class="document-item-30 description">
                                    <col class="document-item-10">
                                    <col class="document-item-10">
                                    <col class="document-item-20">
                                    <col class="document-item-40-px">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="pl-3 pb-3 align-middle border-bottom-0 move" style="max-width: 40px;">
                                        <div><i class="fas fa-grip-vertical"></i></div>
                                    </td>
                                    <td class="pb-3 align-middle border-bottom-0 name">
                                        <div><input type="text" name="items.1.name" autocomplete="off"
                                                    required="required" data-item="name" class="form-control"> <!---->
                                        </div>
                                    </td>
                                    <td class="pb-3 border-bottom-0 description"><textarea
                                            placeholder="Enter item description" name="items.1.description"
                                            data-item="description" resize="none" class="form-control"
                                            style="height: 46px; overflow: hidden;"></textarea></td>
                                    <td class="pb-3 pl-0 pr-2 border-bottom-0 quantity">
                                        <div><input type="number" min="0" name="items.1.quantity" autocomplete="off"
                                                    required="required" data-item="quantity"
                                                    class="form-control text-center p-0 input-number-disabled"> <!---->
                                        </div>
                                    </td>
                                    <td class="pb-3 pl-0 pr-0 border-bottom-0 price"
                                        style="padding-right: 5px; padding-left: 5px;">
                                        <div>
                                            <div data-v-18ba1734="" class="required text-right input-price p-0"
                                                 form-classes="[object Object]"><!----> <input data-v-18ba1734=""
                                                                                               type="tel"
                                                                                               class="v-money form-control"
                                                                                               name="price"
                                                                                               placeholder=""> <!---->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right long-texts pb-3 border-bottom-0 total">
                                        <div>
                                            <div data-v-18ba1734=""
                                                 class="required disabled text-right input-price disabled-money"
                                                 form-classes="[object Object]"><!----> <input data-v-18ba1734=""
                                                                                               type="tel"
                                                                                               class="v-money form-control"
                                                                                               name="total"
                                                                                               placeholder=""
                                                                                               disabled="disabled">
                                                <!----></div>
                                        </div>
                                    </td>
                                    <td class="pb-3 pl-2 align-middle border-bottom-0 delete" style="max-width: 40px;">
                                        <div>
                                            <button type="button" class="btn btn-link btn-delete p-0"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-top-0"></td>
                                    <td colspan="4" class="border-top-0 p-0">
                                        <div index="0" class="line-item-area pb-3">
                                            <div class="line-item-content">
                                                <div class="long-texts line-item-text"
                                                     style="float: left; margin-top: 15px; margin-right: 2px; position: absolute; left: -63px;">
                                                    Tax
                                                </div>
                                                <div data-v-62a88c80="" class="form-group mb-0 select-tax"><!---->
                                                    <div class=""><!---->
                                                        <div data-v-62a88c80="" class="el-select"><!---->
                                                            <div class="el-input el-input--prefix el-input--suffix">
                                                                <!----><input type="text" readonly="readonly"
                                                                              autocomplete="off"
                                                                              placeholder="- Select Tax -"
                                                                              class="el-input__inner"><span
                                                                    class="el-input__prefix"><span data-v-62a88c80=""
                                                                                                   class="el-input__suffix-inner el-select-icon"><i
                                                                            data-v-62a88c80=""
                                                                            class="select-icon-position el-input__icon fa fa-"></i></span>
                                                                    <!----></span><span class="el-input__suffix"><span
                                                                        class="el-input__suffix-inner"><i
                                                                            class="el-select__caret el-input__icon el-icon-arrow-up"></i>
                                                                        <!----><!----><!----><!----><!----></span>
                                                                    <!----></span><!----><!----></div>
                                                            <div class="el-select-dropdown el-popper"
                                                                 style="display: none; min-width: 242px;">
                                                                <div class="el-scrollbar" style="">
                                                                    <div
                                                                        class="el-select-dropdown__wrap el-scrollbar__wrap"
                                                                        style="margin-bottom: -17px; margin-right: -17px;">
                                                                        <ul class="el-scrollbar__view el-select-dropdown__list">
                                                                            <!----><!----> <!---->
                                                                            <li data-v-62a88c80=""
                                                                                class="el-select-dropdown__item selected is-disabled">
                                                                                <span data-v-62a88c80=""
                                                                                      class="float-left">eg (14%)</span>
                                                                                <!----></li> <!----> <!----></ul>
                                                                    </div>
                                                                    <div class="el-scrollbar__bar is-horizontal">
                                                                        <div class="el-scrollbar__thumb"
                                                                             style="transform: translateX(0%);"></div>
                                                                    </div>
                                                                    <div class="el-scrollbar__bar is-vertical">
                                                                        <div class="el-scrollbar__thumb"
                                                                             style="transform: translateY(0%);"></div>
                                                                    </div>
                                                                </div><!----></div>
                                                        </div> <!----> <!----> <select data-v-62a88c80=""
                                                                                       name="items.1.taxes.0"
                                                                                       id="items.1.taxes.0"
                                                                                       class="d-none">
                                                            <option data-v-62a88c80="" value="112147">eg (14%)</option>
                                                        </select> <!---->  <!----> <!----></div> <!----></div>
                                            </div>
                                            <div class="line-item-content-right">
                                                <div class="line-item-content-right-price long-texts text-right">
                                                    <div data-v-18ba1734=""
                                                         class="required disabled text-right input-price disabled-money"
                                                         form-classes="[object Object]"><!----> <input
                                                            data-v-18ba1734="" type="tel" class="v-money form-control"
                                                            name="tax" placeholder="" disabled="disabled"> <!----></div>
                                                </div>
                                                <div class="line-item-content-right-delete pl-2">
                                                    <button type="button" class="btn btn-link btn-delete p-0"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="line-item-area pb-3">
                                            <div class="line-item-content">
                                                <div class="long-texts line-item-text"
                                                     style="float: left; margin-top: 15px; margin-right: 2px; position: absolute; left: -63px;">
                                                    Tax
                                                </div>
                                                <div data-v-62a88c80="" class="form-group mb-0 select-tax"
                                                     style="margin-left: 1px; margin-right: -2px;"><!---->
                                                    <div class=""><!---->
                                                        <div data-v-62a88c80="" class="el-select"><!---->
                                                            <div class="el-input el-input--prefix el-input--suffix">
                                                                <!----><input type="text" autocomplete="off"
                                                                              placeholder="- Select Tax -"
                                                                              class="el-input__inner"
                                                                              readonly="readonly"><span
                                                                    class="el-input__prefix"><span data-v-62a88c80=""
                                                                                                   class="el-input__suffix-inner el-select-icon"><i
                                                                            data-v-62a88c80=""
                                                                            class="select-icon-position el-input__icon fa fa-"></i></span>
                                                                    <!----></span><span class="el-input__suffix"><span
                                                                        class="el-input__suffix-inner"><i
                                                                            class="el-select__caret el-input__icon el-icon-arrow-up"></i>
                                                                        <!----><!----><!----><!----><!----></span>
                                                                    <!----></span><!----><!----></div>
                                                        </div> <!----> <!----> <select data-v-62a88c80=""
                                                                                       name="items.1.taxes.999"
                                                                                       id="items.1.taxes.999"
                                                                                       class="d-none">
                                                            <option data-v-62a88c80="" value="112147">eg (14%)</option>
                                                        </select> <!---->  <!----> <!----></div> <!----></div>
                                            </div>
                                            <div class="line-item-content-right">
                                                <div class="line-item-content-right-price long-texts text-right">
                                                    <div>
                                                        <div
                                                            class="required disabled text-right input-price disabled-money">
                                                            <input type="tel" name="discount_amount" disabled="disabled"
                                                                   value="__" class="v-money form-control text-right">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="line-item-content-right-delete pl-2"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr id="addItem">
                        <td colspan="7" class="text-right border-bottom-0 p-0">
                            <div data-v-ef2b6694="" id="select-item-button-11" class="product-select">
                                <div data-v-ef2b6694="" class="item-add-new">
                                    <button data-v-ef2b6694="" type="button" class="btn btn-link w-100"><i
                                            data-v-ef2b6694="" class="fas fa-plus-circle"></i> &nbsp; Add an Item
                                    </button>
                                </div>
                                <div data-v-ef2b6694="" tabindex="-1" class="aka-select aka-select--fluid"><!----></div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


