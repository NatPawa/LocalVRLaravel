<template>
    <nav class="navbar navbar-light bg-light align-items-center">
        
        <Link href="/" class="w-25">
            <img src="/ResourcesLocal/Logo/LogoLocalLletres.png" alt="" class="w-100">
        </Link>

        <div class="links">
                <Link href="/about-us" class="m-2">About</Link>
                <Link href="/game/edit" class="m-2">Game</Link>
        </div>
        
        <div class="user-image">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <h4 class="mr-5">NatPawa</h4>
                <img src="/Users/ProfileImages/NatPawa.jpg" alt="" class="d-inline-block w-100 rounded-circle">
            </a>
        </div>
    </nav>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    }
}
</script>

<style scoped>

</style>