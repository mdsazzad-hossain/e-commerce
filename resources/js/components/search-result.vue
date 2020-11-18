<template>
  <div>
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                <div v-show="normalMode" class="col-6 col-md-4 col-lg-3" v-for="prod in products.get_product" :key="prod.id">
                                    <div class="product product-7 text-center">
                                        <figure v-for="avatar in prod.get_product_avatars" :key="avatar.id" class="product-media">
                                            <span class="product-label label-new">New</span>
                                            <a href="#" @click.prevent="quickView(prod.slug)">
                                                <img style="width:203px !important;height:203px !important;" :src="ourImage(avatar.front)" alt="Product image" class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" @click.prevent="addWishList(prod.slug)" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <a @click="addToCart(prod)" href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h3 class="product-title"><a href="product.html">{{ prod.product_name }}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                {{ prod.sale_price }}
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 2 Reviews )</span>
                                            </div>
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div>
                                <div v-show="byCat" class="col-6 col-md-4 col-lg-4 col-xl-3" v-for="prod1 in productByCat" :key="prod1.id">
                                    <div v-for="avatar1 in prod1.get_product_avatars" :key="avatar1.id" class="product product-7 text-center">

                                        <figure class="product-media">
                                            <a href="#">
                                            <img
                                                style="height: 203px !important"
                                                :src="ourImage(avatar1.front)"
                                                class="product-image"
                                            />
                                            </a>

                                            <div class="product-action-vertical">
                                            <a
                                                href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"
                                                ><span>add to wishlist</span></a
                                            >
                                            </div>

                                            <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"
                                                ><span>add to cart</span></a
                                            >
                                            </div>
                                        </figure>

                                        <div class="product-body">
                                            <h3 class="product-title">
                                            <a href="#">{{prod1.product_name}}</a>
                                            </h3>
                                            <div class="product-price">
                                                {{prod1.sale_price}}
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>

                                
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                        <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item-total">of 6</li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            <div class="filter-item">
                                                <div class="custom-control">
                                                    <input type="hidden" v-model="form.name">
                                                    <input type="hidden" v-model="form.col_name">
                                                    <li style="cursor:pointer;" @click="productFilter(products.sub_child_name,'sub_child_name')" class="custom-control-label" for="cat-1">{{ products.sub_child_name }}</li>
                                                </div>
                                            </div>
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control" v-for="prod2 in searchData.product" :key="prod2.id">
                                                    <li style="cursor:pointer;" @click="productFilter(prod2.get_brand.slug,'slug')" class="custom-control-label" :for="prod2.get_brand.id">{{ prod2.get_brand.brand_name }}</li>
                                                </div><!-- End .custom-checkbox -->
                                            </div>

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                        Size
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div v-for="prod3 in searchData.product1" :key="prod3.id" class="custom-control">
                                                    <li style="cursor:pointer;" class="custom-control-label" @click="productFilter(prod3.get_attribute_value_id_by_size.id,'size')" for="size-1">{{ prod3.get_attribute_value_id_by_size.value }}</li>
                                                </div><!-- End .custom-checkbox -->
                                            </div>
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                        Colour
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body" style="display:inline-flex;">
                                        <div class="filter-colors" v-for="prod4 in searchData.product2" :key="prod4.id">
                                            <a @click="productFilter(prod4.get_attribute_value_id_by_color.id,'color')" href="#" :style="{background: prod4.get_attribute_value_id_by_color.value}"><span class="sr-only">Color Name</span></a>
                                        </div><!-- End .filter-colors -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#" role="button" aria-expanded="true" aria-controls="widget-5">
                                        Price
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                Price Range:
                                                <span id="filter-price-range"></span>
                                            </div>

                                            <div>
                                                <input @click="productFilter('','sale_price')" style="width: 100%;" v-model="form.max_range" type="range" :min="50" :max="100000" id="myRange">
                                                <p>Value: <span id="demo">{{form.min_range}} - {{form.max_range}}</span></p>
                                            </div>
                                        </div><!-- End .filter-price -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar sidebar-shop -->
                    </aside>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
  </div>
</template>

<script>
export default {
  name: "search-result",
  props: ["search"],
  data() {
    return {
        byCat:false,
        byBr:false,
        bySize:false,
        normalMode:true,
        productByCat:"",
        productByBrand:"",
        productBySize:"",
        searchData:"",
        products:"",
        form:{
            ex_col_name:"product_name",
            ex_name:this.search,
            min_range:"50",
            max_range:"0",
            name:this.search,
            col_name:"",
            slug:"",
            id:"",
            sale_price:""
        }

    };
  },

  mounted() {
        this.form.col_name = 'product_name';
        axios.post('search-data',this.form)
        .then((response)=>{
            this.searchData = response.data;
            this.products = response.data.sub_child;
        })
  },
  methods: {
      productFilter(data,col_name){
            this.form.name='';
            this.form.col_name='';
            this.form.name=data;
            this.form.col_name=col_name;
            axios.post('search-data',this.form)
            .then((response)=>{
                this.normalMode = false;
                this.byCat = true;
                this.productByCat = response.data.products;
            })
        },
        quickView(item){
            axios.get('/quick/view/')
            .then((response)=>{
                window.location.href = '/quick/view/'+item

            })
        },
        addWishList(slug){
          this.form.slug = slug;
            axios.post("wishlist/store",this.form)
            .then((response)=>{
                this.wishResult(response.data)
            })
        },
        wishResult(data)
        {
            if(data.guest == 'guest'){
                $("#error").text('Opps!plese login first.');
                $("#error").show();
                setTimeout(() => {
                    $("#error").hide();
                    $("#error").text();
                },3000);
            }else if(data.errors == 'match'){
                $("#error").show();
                setTimeout(() => {
                    $("#error").hide();

                },3000);
            }else{
                $("#count").text(data.count);
            }
            
        }, 
        addToCart(product){
          this.form.slug = product.slug;
          this.form.id = product.id;
          this.form.sale_price = product.sale_price;
          axios.post("cart/store",this.form)
          .then((response)=>{
            this.cartResult(response.data)
          })
        },
        cartResult(data){
          if(data.guest == 'guest'){
                $("#error").text('Opps!plese login first.');
                $("#error").show();
                setTimeout(() => {
                    $("#error").hide();
                    $("#error").text();
                },3000);
            }else if(data.stockOut == 'stock out'){
                $("#error").text('Stock Out');
                $("#error").show();
                setTimeout(() => {
                    $("#error").hide();
                },3000);
            }else{
                if(data.errors == 'error'){
                    $("#cartError").show();
                    setTimeout(() => {
                        $("#cartError").hide();

                    },2000);
                }else{
                    $("#count").text(data.count);
                    $("#count1").text(data.count1);

                }
            }
        },     
    ourImage(img) {
      return "/images/" + img;
    },
  },
};
</script>

<style>
</style>
