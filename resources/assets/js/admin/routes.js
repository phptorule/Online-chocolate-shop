// import VueRouter from 'vue-router';
import Vue from 'vue'
import VueRouter from 'vue-router'

// Containers
import Full from './containers/Full'
// Views
import Dashboard from './views/Dashboard'
import Charts from './views/Charts'
import Widgets from './views/Widgets'

// Views - Components
import Buttons from './views/components/Buttons'
import SocialButtons from './views/components/SocialButtons'
import Cards from './views/components/Cards'
import Forms from './views/components/Forms'
import Modals from './views/components/Modals'
import Switches from './views/components/Switches'
import Tables from './views/components/Tables'

// Views - Icons
import FontAwesome from './views/icons/FontAwesome'
import SimpleLineIcons from './views/icons/SimpleLineIcons'

// Views - Pages
import Page404 from './views/pages/Page404'
import Page500 from './views/pages/Page500'
import Login from './views/pages/Login'
import Register from './views/pages/Register'

// Views - Products
import AddProducts from './views/products/Add';
import ListProducts from './views/products/List';
import EditProducts from './views/products/Edit';

// Views - Category
import ListCategory from './views/category/List';
import EditCategory from './views/category/Edit';


// Order
import ListOrders from './views/order/List';

Vue.use(VueRouter)

let routes = [
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: { auth: false }
    },
    {
      path: '/',
      redirect: 'dashboard',
      name: 'Home',
      component: Full,
      meta: { auth : true },
      children: [
        {
          path: 'dashboard',
          name: 'Dashboard',
          component: Dashboard
        },
        {
          path: '/products',
          redirect: '/products/list',
          name: 'Products',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path : 'add',
              name : 'Add Products',
              component : AddProducts
            },
            {
              path : 'list',
              name : 'List Products',
              component : ListProducts
            },
            {
              path : 'edit/:id',
              name : 'Edit Products',
              component : EditProducts
            }
          ]
        },
        {
          path: '/category',
          redirect: '/category/list',
          name: 'Category',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path : 'list',
              name : 'Show Category',
              component : ListCategory
            },
            {
              path : 'edit/:id',
              name : 'Edit Category',
              component : EditCategory
            }
          ]
        },
        {
          path: '/order',
          redirect: '/order/list',
          name: 'Order',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path : 'list',
              name : 'List orders',
              component : ListOrders
            }
          ]
        }
      ]
    },
    { 
      path: '/pages',
      redirect: '/pages/404',
      name: 'Pages',
      component: {
        render (c) { return c('router-view') }
      },
      children: [
        {
          path: '404',
          name: 'Page404',
          component: Page404
        },
        {
          path: '500',
          name: 'Page500',
          component: Page500
        },
        {
          path: 'login',
          name: 'Login',
          component: Login
        },
        {
          path: 'register',
          name: 'Register',
          component: Register
        }
      ]
    },
  ];

export default new VueRouter({
    mode: 'hash', // Demo is living in GitHub.io, so required!
    //mode: 'history', // Demo is living in GitHub.io, so required!
    linkActiveClass: 'open active',
    scrollBehavior: () => ({ y: 0 }),
    routes: routes
});