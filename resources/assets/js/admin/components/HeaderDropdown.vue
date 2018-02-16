<template>
      <b-nav-item-dropdown right no-caret>
        <template slot="button-content">
          <i class="fa fa-user-o"></i>
        </template>
        <b-dropdown-header tag="div" class="text-center"><strong>Account</strong></b-dropdown-header>
        <b-dropdown-item @click="logout()"><i class="fa fa-lock"></i> Logout</b-dropdown-item>
      </b-nav-item-dropdown>
</template>
<script>
  export default {
    name: 'header-dropdown',
    data: () => {
      return { itemsCount: 42 }
    },
    methods : {
      logout() {
        this.$auth.logout({
          makeRequest: true,
          params: {},
          success: function () {},
          error: function () {},
          redirect: '/login'
      });
      }
    }
  }
</script>

