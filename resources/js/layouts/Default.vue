<template>
    <div class="main-wrapper main-wrapper-1">
        <header-area/>
        <navigation/>

        <!-- Main Content -->
        <div class="main-content" style="min-height: 600px;">
            <section class="section">
                <div class="section-header">
                    <h1>Default Layout</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Layout</a></div>
                        <div class="breadcrumb-item">Default Layout</div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">This is Example Page</h2>
                    <p class="section-lead">This page is just an example for you to create your own page.</p>
                    <div class="card">
                        <div class="card-header">
                            <h4>Example Card</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            This is card footer
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright © WeStacks 2020
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</template>

<script>
import HeaderArea from '../components/Layout/HeaderArea.vue';
import Navigation from '../components/Layout/Navigation.vue';

export default {
    components: {
        HeaderArea,
        Navigation
    }
}
</script>
