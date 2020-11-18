<template>
  <div>

    <div class="products mb-2" id="loadData" style="display:none;">
      <div class="row justify-content-center">
        <div v-for="item in getItem" :key="item.id" class="col-6 col-md-4 col-lg-4 col-xl-2">
          <div class="product prod_hover product-7 text-center">
            <figure v-for="avtr in item.get_product_avatars" :key="avtr.id" class="product-media">
              <span class="product-label label-new">New</span>
              <a href="#" @click.prevent="quickView(item.slug)">
                <img
                  style="height: 203px !important"
                  :src="viewImage(avtr.front)"
                  alt="Product image"
                  class="product-image"
                />
              </a>

              <div class="product-action-vertical">
                <a @click.prevent="addWishList(item.slug)" href="#" class="btn-product-icon btn-wishlist btn-expandable"
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
                <a @click.prevent="addToCart(item)" href="#" class="btn-product btn-cart"
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
              <div class="product-price">
                  <span class="new-price">{{item.sale_price}} TK</span>
                  <span class="old-price"><del>{{item.promo_price}} TK</del></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <a @click.prevent="load()" href="#" class="btn btn-outline-primary-2">
        <span>Load More</span>
      </a>
    </div>
  </div>
  <!-- End .products -->
</template>

<script>
export default {
    data(){
        return{
            item:"0",
            getItem:"",
          form:{
            slug:"",
            id:"",
            sale_price:""
          }
        }
    },
    mounted(){
      axios.post('load/'+this.item)
        .then((response)=>{
            if (response.data.load) {
                $("#loadData").show();
                this.item = response.data.load.length;
                this.getItem = response.data.load;
            }else{
            }

        })
    },
    methods:{
        load(){
            axios.post('load/'+this.item)
            .then((response)=>{
                if (response.data.load) {
                    $("#loadData").show();
                    this.item = response.data.load.length;
                    this.getItem = response.data.load;
                }else{
                    $("#loadData").hide();
                }

            })
        },
        quickView(item){
            axios.get('/quick/view/'+item)
            .then((response)=>{
                window.location.href = '/quick/view/'+item

            })
        },
        viewImage(img) {
            return "/images/" + img;
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
        addToCart(item){
          this.form.slug = item.slug;
          this.form.id = item.id;
          this.form.sale_price = item.sale_price;
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
    }
};
</script>

<style>
</style>
