<template>
    <v-app>

        <div class="tabs">
            <!-- clipped-left 指定位于左侧的应用程序的 v-navigation-drawer 在应用程序栏下方 -->
            <Header></Header>
        </div>

        <!-- props drawer state ex:if drawer = true then show -->
        <AdminNavigation :drawer="drawer"></AdminNavigation>
        <!-- class="fill-height" 版面垂直致中 -->
        <v-content >
            <slot></slot>
        </v-content>
        <!---footer-->
        <!-- <Footer></Footer> -->
    </v-app>
</template>

<script>
    import AdminNavigation from '../components/AdminNavigation';
    import Header from "../components/Header";
    // import Footer from '../components/Footer'
    export default {
        data() {
            return {
                drawer: null,
                show: false,
            }
        },
        props: {
            source: String
        },
        components: {
            AdminNavigation,
            Header
            // Footer
        }
    }
</script>