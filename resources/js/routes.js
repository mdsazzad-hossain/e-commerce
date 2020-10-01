
import login from './components/backend/login.vue'
import register from './components/backend/register.vue'
import dashboard from './components/backend/dashboard.vue'
import master from './components/frontend/master.vue'

export default[
    {
        path:'/',
        component:login,
        name:'login'
    },
    {
        path:'/register',
        component:register,
        name:'register'
    },
    {
        path:'/dashboard',
        component:dashboard,
        name:'dashboard'
    },
    {
        path:'/home',
        component:master,
        name:'master'
    }
    // {
    //     path:'/',
    //     component:front_login,
    //     name:'front_login',
    //     beforeEnter(to,from,next){
    //       if(!localStorage.getItem('diu-pro-book-sss'))
    //       {
    //           next();
    //       }else{
    //           next('/home');
    //       }
    //   }
    // },
]

