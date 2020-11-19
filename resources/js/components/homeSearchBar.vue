<template>
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
            @keyup="searchData()"
            class="form-control"
            v-model="search"
            placeholder="Search product ..."
          />
          <span v-show="clearShow" @click="searchClear()" style="padding:12px 5px 0 0; display:none;">
          <i style="font-size:1.5rem;" class="icon-close"></i>

          </span>
          <button class="btn btn-primary" type="submit">
            <i class="icon-search"></i>
          </button>
        </div>

        <!-- End .header-search-wrapper -->
      </form>
    </div>


    <div v-show="showItems"
    style="display: none;
        position: absolute;
        background: #fff;
        z-index: 9999;
        width: 100%;
        padding: 5px;
        overflow-y: scroll;
        height: 375px;
        color: #3399FF;">

        <ul v-for="item in allItem" :key="item.id">
            <li id="item" @click="selectItem(item.product_name)"
            style="cursor:pointer; padding-left:10px;"
            onMouseOver="this.style.background='#ddd'"
            onMouseOut="this.style.background='#fff'">
                {{item.product_name}}
            </li>
        </ul>
    </div>

    <!-- End .main-nav -->
  </div>
</template>

<script>
export default {
    name:"homeSearchBar",
    data(){
        return{
            showItems:false,
            allItem:"",
            search:"",
            clearShow:false,
        }
    },
    methods:{
        searchData(){
            if(this.search == ''){
              this.showItems = false;
              this.clearShow = false;
            }else{
              axios.post("search?q="+this.search)
              .then((response)=>{
                  this.allItem = response.data.search;
                  this.showItems = true;
                  this.clearShow = true;
              })
            }
        },
        selectItem(search){
            this.search=search;
            this.showItems = false;
            window.location.href="search-result/"+this.search;
        },

        searchClear(){
            this.search = '';
            this.showItems = false;
            this.clearShow = false;

        }
    }
};
</script>


<style scoped>

</style>
