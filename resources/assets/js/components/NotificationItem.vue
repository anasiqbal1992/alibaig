
<template>
    <div class="wrap">
        <a href="../orders"   class="dropdown-item">
           <i><span class="fa fa-user "></span> {{ unread.data.user.name }}</i> placed new Order.
        </a>
         <div class="dropdown-divider"></div>
    </div>
</template>

<script>
    export default {
        props:['unread'],
    }
</script>