<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Products list
                    <a 
                        href="javascript:;" 
                        data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-html="true" 
                        trigger="click" 
                        title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                        <i class="fas fa-question-circle"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:80px">Picture</th>
                        <th style="width:100px">Product name</th>
                        <th style="width:80px">Price</th>
                        <th style="width:120px">Short desc</th> 
                        <th style="width:80px">Variants</th>
                        <th style="width:80px">Category</th>                
                        <th style="width:100px">Tags</th>             
                        <th style="width:80px">Languages</th>           
                        <th style="width:100px">Owner</th>
                        <th style="width:120px">Creation date</th>
                    </thead>
            
                    <tbody> 
                    @foreach($products as $product)
                        <tr role="row">
                            <td class="v-align-middle picture">
                                <a href="#">
                                    <img src="@if(isset($product->picture->path)) {{Storage::url($product->picture->path)}} @else https://ae01.alicdn.com/kf/HTB1VGbHiZuYBuNkSmRy763A3pXaX.png @endif" alt="cat1">
                                </a>
                            </td>
                            <td class="v-align-middle">
                                <a href="#">
                                    <strong>{{$product->productLang()->reference}}</strong>
                                </a>
                            </td>
                            <td class="v-align-middle">{{$product->price}}</td>
                            <td class="v-align-middle">{{$product->productLang()->short_description}}</td>
                            <td class="v-align-middle">
                                @foreach($product->attributeValues()->distinct()->get(['attribute_id']) as $attributeValue)
                                <a href="#" class="btn btn-tag">{{$attributeValue->attribute->attributeLang()->reference}}</a>
                                @endforeach
                            </td>
                            <td class="v-align-middle">
                                @foreach($product->categories as $category)
                                    <a href="#" class="btn btn-tag"><strong>{{$category->categoryLang()->reference}}</strong></a>
                                @endforeach
                            </td>
                            <td class="v-align-middle">
                                <a href="#" class="btn btn-tag">grey</a>
                                <a href="#" class="btn btn-tag">summer</a>
                            </td>
                            <td class="v-align-middle">
                             @foreach($product->productLangs as $productLang)
                                        @if($productLang->reference != "")
                                            <a href="#" class="btn btn-tag">{{$productLang->lang->alpha_2_code}}</a>
                                        @endif
                                    @endforeach
                            </td>
                            <td class="v-align-middle">
                                <a href="#">
                                <strong>{{$product->partner->company_name}}</strong>
                                </a>
                            </td>
                            <td class="v-align-middle">
                                {{$product->created_at}}
                            </td>
                        </tr>  
                    @endforeach                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>