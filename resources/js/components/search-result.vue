<template>
  <div>
    <div
      class="page-header text-center"
      style="background-image: url('assets/images/page-header-bg.jpg')"
    >
      <div class="container">
        <h1 class="page-title">Vendor<span>Shop</span></h1>
      </div>
      <!-- End .container -->
    </div>
    <!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Vendor</li>
        </ol>
      </div>
      <!-- End .container -->
    </nav>
    <!-- End .breadcrumb-nav -->

    <div class="page-content">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="toolbox">
              <div class="toolbox-left">
                <div class="toolbox-info">
                  Showing <span>9 of 56</span> Products
                </div>
                <!-- End .toolbox-info -->
              </div>
              <!-- End .toolbox-left -->

              <div class="toolbox-right">
                <div class="toolbox-sort">
                  <label for="sortby">Sort by:</label>
                  <div class="select-custom">
                    <select name="sortby" id="sortby" class="form-control">
                      <option value="popularity" selected="selected">
                        Most Popular
                      </option>
                      <option value="rating">Most Rated</option>
                      <option value="date">Date</option>
                    </select>
                  </div>
                </div>
                <!-- End .toolbox-sort -->
                <div class="toolbox-layout">
                  <a href="category-list.html" class="btn-layout">
                    <svg width="16" height="10">
                      <rect x="0" y="0" width="4" height="4"></rect>
                      <rect x="6" y="0" width="10" height="4"></rect>
                      <rect x="0" y="6" width="4" height="4"></rect>
                      <rect x="6" y="6" width="10" height="4"></rect>
                    </svg>
                  </a>

                  <a href="category-2cols.html" class="btn-layout">
                    <svg width="10" height="10">
                      <rect x="0" y="0" width="4" height="4"></rect>
                      <rect x="6" y="0" width="4" height="4"></rect>
                      <rect x="0" y="6" width="4" height="4"></rect>
                      <rect x="6" y="6" width="4" height="4"></rect>
                    </svg>
                  </a>

                  <a href="category.html" class="btn-layout">
                    <svg width="16" height="10">
                      <rect x="0" y="0" width="4" height="4"></rect>
                      <rect x="6" y="0" width="4" height="4"></rect>
                      <rect x="12" y="0" width="4" height="4"></rect>
                      <rect x="0" y="6" width="4" height="4"></rect>
                      <rect x="6" y="6" width="4" height="4"></rect>
                      <rect x="12" y="6" width="4" height="4"></rect>
                    </svg>
                  </a>

                  <a href="category-4cols.html" class="btn-layout active">
                    <svg width="22" height="10">
                      <rect x="0" y="0" width="4" height="4"></rect>
                      <rect x="6" y="0" width="4" height="4"></rect>
                      <rect x="12" y="0" width="4" height="4"></rect>
                      <rect x="18" y="0" width="4" height="4"></rect>
                      <rect x="0" y="6" width="4" height="4"></rect>
                      <rect x="6" y="6" width="4" height="4"></rect>
                      <rect x="12" y="6" width="4" height="4"></rect>
                      <rect x="18" y="6" width="4" height="4"></rect>
                    </svg>
                  </a>
                </div>
                <!-- End .toolbox-layout -->
              </div>
              <!-- End .toolbox-right -->
            </div>
            <!-- End .toolbox -->
            <div class="products mb-3">
              <div
                class="row justify-content-center"
                v-show="cat_search_product"
                v-for="brand in cat_search_data.get_brand"
                  :key="brand.id"
               >
                <div
                  class="col-6 col-md-4 col-lg-4 col-xl-3"
                   v-for="pro in brand.get_product"
                    :key="pro.id"
                >
                  <div
                    class="product product-7 text-center"
                  >
                    <figure
                      class="product-media"
                      v-for="avtr in pro.get_product_avatars"
                      :key="avtr.id"
                    >
                      <span class="product-label label-new">New</span>
                      <a href="product.html">
                        <img
                          style="height: 203px !important"
                          :src="ourImage(avtr.front)"
                          alt="Product image"
                          class="product-image"
                        />
                      </a>

                      <div class="product-action-vertical">
                        <a
                          href="#"
                          class="btn-product-icon btn-wishlist btn-expandable"
                          ><span>add to wishlist</span></a
                        >
                        <a
                          href="popup/quickView.html"
                          class="btn-product-icon btn-quickview"
                          title="Quick view"
                          ><span>Quick view</span></a
                        >
                      </div>

                      <div class="product-action">
                        <a href="#" class="btn-product btn-cart"
                          ><span>add to cart</span></a
                        >
                      </div>
                    </figure>
                    <div class="product-body">
                      <div class="product-cat">
                        <a href="#">Women</a>
                      </div>
                      <!-- End .product-cat -->
                      <h3 class="product-title">
                        <a href="product.html">{{ pro.product_name }}</a>
                      </h3>
                      <!-- End .product-title -->
                      <div class="product-price">
                        {{ pro.sale_price }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="row justify-content-center"
                v-show="brandSearchData"
               >
                <div
                  class="col-6 col-md-4 col-lg-4 col-xl-3"
                  v-for="product in show_by_brand"
                  :key="product.id"
                >
                  <div
                    class="product product-7 text-center"
                  >
                    <figure
                      class="product-media"
                      v-for="avtr in product.get_product_avatars"
                      :key="avtr.id"
                    >
                      <span class="product-label label-new">New</span>
                      <a href="product.html">
                        <img
                          style="height: 203px !important"
                          :src="ourImage(avtr.front)"
                          alt="Product image"
                          class="product-image"
                        />
                      </a>

                      <div class="product-action-vertical">
                        <a
                          href="#"
                          class="btn-product-icon btn-wishlist btn-expandable"
                          ><span>add to wishlist</span></a
                        >
                        <a
                          href="popup/quickView.html"
                          class="btn-product-icon btn-quickview"
                          title="Quick view"
                          ><span>Quick view</span></a
                        >
                      </div>

                      <div class="product-action">
                        <a href="#" class="btn-product btn-cart"
                          ><span>add to cart</span></a
                        >
                      </div>
                    </figure>
                    <div class="product-body">
                      <div class="product-cat">
                        <a href="#">Women</a>
                      </div>
                      <!-- End .product-cat -->
                      <h3 class="product-title">
                        <a href="product.html">{{ product.product_name }}</a>
                      </h3>
                      <!-- End .product-title -->
                      <div class="product-price">
                        {{ product.sale_price }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="row justify-content-center"
                v-show="showByName"
               
              >
                <div
                   v-for="item in search"
                  :key="item.id"
                  class="col-6 col-md-4 col-lg-4 col-xl-3"
                  
                >
                  <div class="product product-7 text-center">
                    <figure
                      class="product-media"
                      v-for="avtr in item.get_product_avatars"
                      :key="avtr.id"
                    >
                      <span class="product-label label-new">New</span>
                      <a href="product.html">
                        <img
                          style="height: 203px !important"
                          :src="ourImage(avtr.front)"
                          alt="Product image"
                          class="product-image"
                        />
                      </a>

                      <div class="product-action-vertical">
                        <a
                          href="#"
                          class="btn-product-icon btn-wishlist btn-expandable"
                          ><span>add to wishlist</span></a
                        >
                        <a
                          href="popup/quickView.html"
                          class="btn-product-icon btn-quickview"
                          title="Quick view"
                          ><span>Quick view</span></a
                        >
                      </div>

                      <div class="product-action">
                        <a href="#" class="btn-product btn-cart"
                          ><span>add to cart</span></a
                        >
                      </div>
                    </figure>
                    <div class="product-body">
                      <div class="product-cat">
                        <a href="#">Women</a>
                      </div>
                      <!-- End .product-cat -->
                      <h3 class="product-title">
                        <a href="product.html">{{ item.product_name }}</a>
                      </h3>
                      <!-- End .product-title -->
                      <div class="product-price">
                        {{ item.sale_price }}
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  v-for="item in search"
                  :key="item.id"
                  class="col-6 col-md-4 col-lg-4 col-xl-3"
                >
                  <div
                    v-for="br in item.get_brand.get_sub_child_category
                      .get_brand"
                    :key="br.id"
                  >
                    <div
                      class="product product-7 text-center"
                      v-for="product in br.get_product"
                      :key="product.id"
                    >
                      <div v-if="item.id != product.id">
                        <figure
                          class="product-media"
                          v-for="avtr in product.get_product_avatars"
                          :key="avtr.id"
                        >
                          <span class="product-label label-new">New</span>
                          <a href="product.html">
                            <img
                              style="height: 203px !important"
                              :src="ourImage(avtr.front)"
                              alt="Product image"
                              class="product-image"
                            />
                          </a>

                          <div class="product-action-vertical">
                            <a
                              href="#"
                              class="btn-product-icon btn-wishlist btn-expandable"
                              ><span>add to wishlist</span></a
                            >
                            <a
                              href="popup/quickView.html"
                              class="btn-product-icon btn-quickview"
                              title="Quick view"
                              ><span>Quick view</span></a
                            >
                          </div>

                          <div class="product-action">
                            <a href="#" class="btn-product btn-cart"
                              ><span>add to cart</span></a
                            >
                          </div>
                        </figure>
                        <div class="product-body">
                          <div class="product-cat">
                            <a href="#">Women</a>
                          </div>
                          <!-- End .product-cat -->
                          <h3 class="product-title">
                            <a href="product.html">{{
                              product.product_name
                            }}</a>
                          </h3>
                          <!-- End .product-title -->
                          <div class="product-price">
                            {{ product.sale_price }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End .row -->
            </div>
            <!-- End .products -->

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
                  <a
                    class="page-link page-link-next"
                    href="#"
                    aria-label="Next"
                  >
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
              <div class="widget widget-collapsible">
                <h3 class="widget-title">
                  <a
                    data-toggle="collapse"
                    href="#widget-1"
                    role="button"
                    aria-expanded="true"
                    aria-controls="widget-1"
                  >
                    Category
                  </a>
                </h3>
                <!-- End .widget-title -->

                <div class="collapse show" id="widget-1">
                  <div class="widget-body">
                    <div
                      class="filter-items filter-items-count"
                      v-for="item in search"
                      :key="item.id"
                    >
                      <div
                        class="filter-item"
                        v-for="itm in item.get_brand.get_child_category
                          .get_sub_child_category"
                        :key="itm.id"
                      >
                        <div class="custom-control custom-checkbox">
                          <input
                            @click.prevent="searchData(itm.sub_child_name)"
                            type="checkbox"
                            class="custom-control-input"
                            :id="itm.sub_child_name"
                          />
                          <label
                            class="custom-control-label"
                            :for="itm.sub_child_name"
                            >{{ itm.sub_child_name }}</label
                          >
                        </div>
                        <!-- End .custom-checkbox -->
                        <span class="item-count">3</span>
                      </div>
                    </div>
                    <!-- End .filter-items -->
                  </div>
                  <!-- End .widget-body -->
                </div>
                <!-- End .collapse -->
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
                    Brand
                  </a>
                </h3>
                <!-- End .widget-title -->

                <div class="collapse show" id="widget-2">
                  <div class="widget-body">
                    <div
                      v-show="showByName"
                      class="filter-items"
                      v-for="item in search"
                      :key="item.id"
                     >
                     
                      <div
                        class="filter-item"
                        v-for="itm in item.get_brand.get_sub_child_category
                          .get_brand"
                        :key="itm.id"
                      >
                        <div class="custom-control custom-checkbox">
                          <input
                            @click.prevent="searchProductByBrand(itm.id)"
                            type="checkbox"
                            class="custom-control-input"
                            :id="itm.brand_name"
                          />
                          <label
                            class="custom-control-label"
                            :for="itm.brand_name"
                            >{{ itm.brand_name }}</label
                          >
                        </div>
                        <!-- End .custom-checkbox -->
                      </div>
                    </div>
                    <div
                      v-show="cat_search_product"
                      class="filter-items"
                     >
                      <div
                        class="filter-item"
                         v-for="item in cat_search_data.get_brand"
                        :key="item.id"
                      >
                        <div class="custom-control custom-checkbox">
                          <input
                            @click="searchProductByBrand(item.id)"
                            type="checkbox"
                            class="custom-control-input"
                            :id="item.brand_name"
                          />
                          <label
                            class="custom-control-label"
                            :for="item.brand_name"
                            >{{ item.brand_name }}</label
                          >
                        </div>
                        <!-- End .custom-checkbox -->
                      </div>
                    </div>
                    <!-- End .filter-items -->
                  </div>
                  <!-- End .widget-body -->
                </div>
                <!-- End .collapse -->
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
                    Size
                  </a>
                </h3>
                <!-- End .widget-title -->

                <div class="collapse show" id="widget-3">
                  <div
                    v-show="!brandSearchData"
                    class="widget-body"
                    v-for="item in search"
                    :key="item.id"
                  >
                    <div
                      class="filter-colors"
                      v-for="itm in item.get_brand.get_sub_child_category
                        .get_brand"
                      :key="itm.id"
                    >
                      <div
                        class="custom-control custom-checkbox"
                        v-for="product in itm.get_product"
                        :key="product.id"
                      >
                        <input
                          type="checkbox"
                          class="custom-control-input"
                          :id="product.size"
                        />
                        <label
                          class="custom-control-label"
                          :for="product.size"
                          >{{ product.size }}</label
                        >
                      </div>
                    </div>
                    <!-- End .filter-colors -->
                  </div>

                  <div
                    v-show="brandSearchData"
                    class="widget-body"
                    v-for="item in cat_search_data"
                    :key="item.id"
                  >
                    <div
                      class="filter-colors"
                      v-for="itm in item.get_brand"
                      :key="itm.id"
                    >
                      <div
                        class="custom-control custom-checkbox"
                        v-for="product in itm.get_product"
                        :key="product.id"
                      >
                        <input
                          type="checkbox"
                          class="custom-control-input"
                          :id="product.size"
                        />
                        <label
                          class="custom-control-label"
                          :for="product.size"
                          >{{ product.size }}</label
                        >
                      </div>
                    </div>
                    <!-- End .filter-colors -->
                  </div>
                </div>
                <!-- End .collapse -->
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
                <!-- End .widget-title -->

                <div class="collapse show" id="widget-5">
                  <div class="widget-body">
                    <div class="filter-price">
                      <div class="filter-price-text">
                        Price Range:
                        <span id="filter-price-range">$0 - $750</span>
                      </div>
                      <!-- End .filter-price-text -->

                      <div
                        id="price-slider"
                        class="noUi-target noUi-ltr noUi-horizontal"
                      >
                        <div class="noUi-base">
                          <div class="noUi-connects">
                            <div
                              class="noUi-connect"
                              style="
                                transform: translate(0%, 0px) scale(0.75, 1);
                              "
                            ></div>
                          </div>
                          <div
                            class="noUi-origin"
                            style="transform: translate(-100%, 0px); z-index: 5"
                          >
                            <div
                              class="noUi-handle noUi-handle-lower"
                              data-handle="0"
                              tabindex="0"
                              role="slider"
                              aria-orientation="horizontal"
                              aria-valuemin="0.0"
                              aria-valuemax="550.0"
                              aria-valuenow="0.0"
                              aria-valuetext="$0"
                            >
                              <div class="noUi-touch-area"></div>
                              <div class="noUi-tooltip">$0</div>
                            </div>
                          </div>
                          <div
                            class="noUi-origin"
                            style="transform: translate(-25%, 0px); z-index: 4"
                          >
                            <div
                              class="noUi-handle noUi-handle-upper"
                              data-handle="1"
                              tabindex="0"
                              role="slider"
                              aria-orientation="horizontal"
                              aria-valuemin="200.0"
                              aria-valuemax="1000.0"
                              aria-valuenow="750.0"
                              aria-valuetext="$750"
                            >
                              <div class="noUi-touch-area"></div>
                              <div class="noUi-tooltip">$750</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End #price-slider -->
                    </div>
                    <!-- End .filter-price -->
                  </div>
                  <!-- End .widget-body -->
                </div>
                <!-- End .collapse -->
              </div>
            </div>
            <!-- End .sidebar sidebar-shop -->
          </aside>
          <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
      </div>
      <!-- End .container -->
    </div>
    <!-- End .page-content -->
  </div>
</template>

<script>
export default {
  name: "search-result",
  props: ["search"],
  data() {
    return {
      cat_search_product: false,
      brandSearchData:false,
      showByName:true,
      cat_search_data: "",
      show_by_brand:""
    };
  },

  mounted() {},
  methods: {
    searchData(name) {
      axios.get("search-data/" + name).then((response) => {
        this.cat_search_product = true;
        this.showByName = false;
        this.cat_search_data = response.data.datas;
        this.brandSearchData = true;
      });
    },
    searchProductByBrand(id){
       axios.get("search-product-by-brand/" + id)
       .then((response) => {
        this.cat_search_product = true;
        this.showByName = false;
        this.cat_search_data = response.data.data;
        this.brandSearchData = true;
      });
    },
    ourImage(img) {
      return "/images/" + img;
    },
  },
};
</script>

<style>
</style>