<template>
    <li class="nav-item dropdown" @click="markNotificationAsRead" >
        <a class="nav-link" data-toggle="dropdown" role="button" aria-expanded="false" href="#">
            <span class="fa fa-bell"></span><span class="badge badge-warning">{{unreadNotifications.length}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" role="menu">
            
            <li>
                <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>
            </li>
        </ul>
    </li>
</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {
    props: ['unreads','adminid'],
    components: {NotificationItem},
    data(){
            return {
                unreadNotifications: this.unreads
            }
        },
         methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
        mounted() {
        console.log('admins.' + this.adminid);
             Echo.private('admins.' + this.adminid)
                .notification((notification) => {
                    console.log(notification.type);
                    
                    let newUnreadNotifications = {data: {order: notification.order, user: notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
