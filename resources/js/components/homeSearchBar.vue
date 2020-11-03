<template>
  <div>
    <div class="header-center" style="display: block; position: relative">
      <div
        class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block"
      >
        <a href="#" class="search-toggle" role="button"
          ><i class="icon-search"></i
        ></a>
        <form action="#" method="get">
          <div class="header-search-wrapper search-wrapper-wide">
            <!-- End .select-custom -->
            <label for="q" class="sr-only">Search</label>
            <input
              type="search"
              @keyup.prevent="searchData()"
              class="form-control"
              v-model="search"
              placeholder="Search product ..."
              required=""
            />
            <button class="btn btn-primary" type="submit">
              <i class="icon-search"></i>
            </button>
          </div>

          <!-- End .header-search-wrapper -->
        </form>
      </div>
      <div
        id="allItem"
        style="
          display: none;
          position: absolute;
          background-color: #ddd;
          z-index: 9999;
          width: 45%;
          padding: 5px;
        "
      >
        <ul>
          <li
            v-for="item in items"
            :key="item.id"
            @click.prevent="selectItem(item)"
            id="item"
            style="
              color: #000;
              font-size: 15px;
              font-weight: 700;
              cursor: pointer;
            "
          >{{item.product_name}}</li>
        </ul>
      </div>

      <!-- End .main-nav -->
    </div>
  </div>
</template>

<script>
export default {
    name:"homeSearchBar",
    data(){
        return{
            search:"",
            items:""
        }
    },
    methods:{
        searchData(){
            axios.get('search?q='+this.search)
            .then((response)=>{
                if (response.data.search) {
                    this.items = response.data.search;
                    $("#allItem").show();
                }
            })
        },
        selectItem(item){
            this.search = item.product_name;
            $("#allItem").hide();
            axios.get('search?q='+this.search)
            .then((response)=>{
                if (response.data.search) {
                    window.location.href = 'search-result/'+this.search
                }
            })
        }
    }
}
</script>

<style>
</style>
