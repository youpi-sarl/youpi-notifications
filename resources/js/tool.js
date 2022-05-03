Nova.booting((Vue, router, store) => {
    Vue.config.devtools = true
    Vue.component('notification-link', require('./components/NotificationLink'))
    Vue.component('notification-item', require('./components/NotificationItem'))
    Vue.component('test-notif', require('./components/NotificationsDropdown'))
  // router.addRoutes([
  //   {
  //     name: 'youpi-notifications',
  //     path: '/youpi-notifications',
  //     component: require('./components/Tool'),
  //   },
  // ])
})
