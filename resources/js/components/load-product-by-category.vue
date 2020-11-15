<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="products mb-3">
            <div class="row justify-content-center">
                <div v-show="normalMode" class="row col-md-12" v-for="br in categories.get_brand" :key="br.id">
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3" v-for="product in br.get_product" :key="product.id"> 
                        <div v-for="avtr in product.get_product_avatars" :key="avtr.id" class="product product-7 text-center">

                        <figure class="product-media">
                            <a href="#">
                            <img
                                style="height: 203px !important"
                                :src="ourImage(avtr.front)"
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
                            <a href="#">{{product.product_name}}</a>
                            </h3>
                            <div class="product-price">
                            {{product.sale_price}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div v-show="byCat" class="row col-md-12" v-for="br1 in productByCat.get_brand" :key="br1.id">
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3" v-for="product1 in br1.get_product" :key="product1.id"> 
                        <div v-for="avtr1 in product1.get_product_avatars" :key="avtr1.id" class="product product-7 text-center">

                        <figure class="product-media">
                            <a href="#">
                            <img
                                style="height: 203px !important"
                                :src="ourImage(avtr1.front)"
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
                            <a href="#">{{product1.product_name}}</a>
                            </h3>
                            <div class="product-price">
                            {{product1.sale_price}}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div v-show="byBr" class="row col-md-12">
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3" v-for="product2 in productByBrand.get_product" :key="product2.id"> 
                       
                        <div v-for="avtr2 in product2.get_product_avatars" :key="avtr2.id" class="product product-7 text-center">

                        <figure class="product-media">
                            <a href="#">
                            <img
                                style="height: 203px !important"
                                :src="ourImage(avtr2.front)"
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
                            <a href="#">{{product2.product_name}}</a>
                            </h3>
                            <div class="product-price">
                            {{product2.sale_price}}
                            </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
            <!-- End .row -->
          </div>
          <!-- End .products -->
           </div>
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a
                  class="page-link page-link-prev"
                  href="#"
                  aria-label="Previous"
                  tabindex="-1"
                  aria-disabled="true"
                >
                  <span aria-hidden="true"
                    ><i class="icon-long-arrow-left"></i></span
                  >Prev
                </a>
              </li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item-total">of 6</li>
              <li class="page-item">
                <a class="page-link page-link-next" href="#" aria-label="Next">
                  Next
                  <span aria-hidden="true"
                    ><i class="icon-long-arrow-right"></i
                  ></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- End .col-lg-9 -->
        <aside class="col-lg-3 order-lg-first">
          <div class="sidebar sidebar-shop">
            <div class="widget widget-clean">
              <label>Filters:</label>
              <a href="#" class="sidebar-filter-clear">Clean All</a>
            </div>
            <!-- End .widget widget-clean -->

            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a
                  data-toggle="collapse"
                  href="#widget-1"
                  role="button"
                  aria-expanded="true"
                  aria-controls="widget-1"
                  class=""
                >
                  Category
                </a>
              </h3>
              <!-- End .widget-title -->

              <div class="collapse show" id="widget-1" style="">
                <div class="widget-body">
                  <div class="filter-items filter-items-count">
                    <div v-for="child in categories.get_child_category" :key="child.id" class="filter-item">
                      <div class="custom-control custom-checkbox">
                        <input type="hidden" v-model="form.name">
                        <input type="hidden" v-model="form.col_name">
                        <li style="cursor:pointer;" @click="productFilter(child.child_name,'child_name')">{{child.child_name}}</li>
                      </div>
                      <!-- End .custom-checkbox -->
                      <span class="item-count">3</span>
                    </div>
                    <!-- End .filter-item -->
                  </div>
                  <!-- End .filter-items -->
                </div>
                <!-- End .widget-body -->
              </div>
              <!-- End .collapse -->
            </div>
            <!-- End .widget -->

            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a
                  data-toggle="collapse"
                  href="#widget-4"
                  role="button"
                  aria-expanded="true"
                  aria-controls="widget-4"
                >
                  Brand
                </a>
              </h3>

              <div class="collapse show" id="widget-4">
                <div class="widget-body">
                  <div class="filter-items">
                    <div v-for="brand in categories.get_brand" :key="brand.id" class="filter-item">
                      <div class="custom-control custom-checkbox">
                        <input
                          type="checkbox"
                          class="custom-control-input"
                          id="brand-1"
                        />
                        <li style="cursor:pointer;" @click="productFilter(brand.slug,'slug')">{{brand.brand_name}}</li>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a
                  data-toggle="collapse"
                  href="#widget-2"
                  role="button"
                  aria-expanded="true"
                  aria-controls="widget-2"
                >
                  Size
                </a>
              </h3>
              <!-- End .widget-title -->

              <div class="collapse show" id="widget-2">
                <div class="widget-body">
                  <div class="filter-items">
                    <div class="filter-item" v-for="brand1 in categories.get_brand" :key="brand1.id" >
                      <div class="custom-control custom-checkbox" v-for="size in brand1.get_product" :key="size.id">
                       <li style="cursor:pointer;" @click="productFilter(size.size,'size')">{{size.size}}</li>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a
                  data-toggle="collapse"
                  href="#widget-3"
                  role="button"
                  aria-expanded="true"
                  aria-controls="widget-3"
                >
                  Colour
                </a>
              </h3>

              <div class="collapse show" id="widget-3">
                <div class="widget-body">
                  <div class="filter-colors" v-for="brand2 in categories.get_brand" :key="brand2.id">
                      <a @click="productFilter(pro1.color,'color')" v-for="pro1 in brand2.get_product" :key="pro1.id" href="#" :style="{background: pro1.color}"
                      ><span class="sr-only">Color Name</span></a
                    >
                  </div>
                </div>
              </div>
            </div>
            
            <div class="widget widget-collapsible">
              <h3 class="widget-title">
                <a
                  data-toggle="collapse"
                  href="#widget-5"
                  role="button"
                  aria-expanded="true"
                  aria-controls="widget-5"
                >
                  Price
                </a>
              </h3>

              <div class="collapse show" id="widget-5">
                <div class="widget-body">
                  <div class="filter-price">
                    <div class="filter-price-text">
                      Price Range:
                    </div>

                    <div>
                      <input @click="productFilter('','sale_price')" style="width: 100%;" type="range" min="50" max="100000" value="50" id="myRange">
                      <p>Value: <span id="demo"></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:"loadCategoryProduct",
    props:["cat_name"],
    data(){
        return{
            available:false,
            byCat:false,
            byBr:false,
            bySize:false,
            normalMode:true,
            categories:"",
            productByCat:"",
            productByBrand:"",
            productBySize:"",
            form:{
                max_range:"",
                min_range:"",
                name:"",
                col_name:""
            }
        }
    },
    mounted(){
        this.form.min_range =  document.getElementById("myRange").value;
        this.form.name = this.cat_name;
        this.form.col_name = 'cat_name';
        axios.post('load-category',this.form)
        .then((response)=>{
            this.categories = response.data.catagories;
        })

        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
        
        document.getElementById("myRange").oninput = function() {
          output.innerHTML = this.value;
          
        }
    },
    computed: {
        // filterd() {
        //     return this.productByBrand.filter((cat) =>{
        //         cat.size.startsWith(this.form.name)
        //     });
        // }
    },
    methods:{
        productFilter(data,col_name){
            this.form.name='';
            this.form.col_name='';
            this.form.name=data;
            this.form.col_name=col_name;
            this.form.max_range = document.getElementById("myRange").value;
            axios.post('load-category',this.form)
            .then((response)=>{
                if (this.form.col_name == "child_name") {
                    this.normalMode = false;
                    this.byCat = true;
                    this.productByCat = response.data.catagories;
                    
                }else if(this.form.col_name == "slug") {
                    this.normalMode = false;
                    this.byCat = false;
                    this.byBr = true;
                    this.productByBrand = response.data.catagories;
                    
                }else if(this.form.col_name == "size") {
                    this.normalMode = false;
                    this.byCat = true;
                    this.byBr = false;
                    this.productByCat = response.data.catagories;
                    
                }else if(this.form.col_name == "color" || this.form.col_name == "sale_price") {
                    this.normalMode = false;
                    this.byCat = true;
                    this.byBr = false;
                    this.productByCat = response.data.catagories;
                    
                }
            })
        },
        
        ourImage(img) {
            return "/images/" + img;
        },
    }
};
</script>

<style scoped>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>