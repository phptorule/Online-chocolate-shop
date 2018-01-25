export default {
  items: [
    {
      name: 'Dashboard',
      url: '/dashboard',
      icon: 'icon-speedometer',
      badge: {
        variant: 'primary'
      }
    },
    {
      name: 'Products',
      url: '/products',
      icon: 'fa fa-th-large',
      children: [
        {
          name: 'Add Products',
          url: '/products/add',
          icon: 'fa fa-th-large'
        },
        {
          name: 'Show Products',
          url: '/products/list',
          icon: 'fa fa-th-large'
        }
      ]
    },
    {
      name: 'Category',
      url: '/category',
      icon: 'fa fa-th-large',
      children: [
        {
          name: 'Show Category',
          url: '/category/list',
          icon: 'fa fa-th-large'
        }
      ]
    }
  ]
}
