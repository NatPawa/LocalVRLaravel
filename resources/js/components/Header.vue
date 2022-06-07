<template>
    <nav class="navbar navbar-light bg-light align-items-center p-3">
        
        <Link href="/" class="w-10">
            <img src="/ResourcesLocal/Logo/LogoLocalLletres.png" alt="" class="w-100">
        </Link>

        <div class="links">
                <Link href="/about-us" class="mr-5 text-primary fw-normal fs-5">Inicio</Link>
                <Link href="/play" class="mr-5 text-primary fw-normal fs-5">Jugar</Link>
                <Link href="/game/edit" class="mr-5 text-primary fw-normal fs-5">Eventos</Link>
                <Link href="/game/edit" class="mr-5 text-primary fw-normal fs-5">Top</Link>
        </div>
        
        <div class="user-image">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <h4 class="mr-2 mb-0 text-primary fs-5">NatPawa</h4>
                <img src="/Users/ProfileImages/NatPawa.jpg" alt="" class="d-inline-block w-25 rounded-circle mr-1">
                <i class="fa-solid fa-caret-down text-primary"></i>
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