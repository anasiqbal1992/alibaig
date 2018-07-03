<template>
    <div>
        <div class="progress">
            <progressbar :now="progress" type="primary" striped animated ></progressbar>
        </div>
        <div class="order-status">
            <strong>Order Status:</strong> {{ statusNew }}
        </div>
    </div>
</template>

<script>
    import { progressbar } from 'vue-strap'
    export default {
        components: {
            progressbar
        },

        props: ['status', 'initial', 'order_id'],
        data() {
            return {
                statusNew: this.status,
                progress: this.initial
            }
        },
        mounted() {
            Echo.channel('order-tracker.' + this.order_id)
            .listen('OrderStatusChanged', (order) => {
              this.statusNew = order.status_name
              this.progress = order.status_percent
            });
        }
    }
</script>
