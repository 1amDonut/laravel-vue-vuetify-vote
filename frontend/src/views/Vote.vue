<template>
    <v-container class=" px-auto">

        <v-row align="center" justify="center">

            <v-col cols="12">
                <div style="border-bottom: 2px solid #00387b" class="Block_incontent">
                    <h1>投票活動</h1>
                </div>
            </v-col>
            <v-flex sm4 v-for="(item,index) in visiblePages" :key="index" pl-2 pr-2>

                <v-card class="mx-auto my-4" max-width="344" outlined>
                    <v-list-item three-line>
                        <v-list-item-content>
                            <div class="overline mb-4">OVERLINE</div>
                            <v-list-item-title class="headline mb-1">活動 {{item.title}}</v-list-item-title>
                            <v-list-item-subtitle>內容的部分</v-list-item-subtitle>
                        </v-list-item-content>

                        <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
                    </v-list-item>

                    <v-card-actions>
                        <v-btn text>
                            <router-link to="/voting" class="white--text">前往投票</router-link>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>

        </v-row>
        <!--pageination ---->
        <v-row>
            <v-pagination v-model="page" :length="Math.ceil(rows.length/perPage)"></v-pagination>

        </v-row>
    </v-container>

</template>
<script>
    export default {
        data() {
            return {
                page: 1,
                perPage: 6,

                rows: [{
                        title: '1',
                        content: 'this is a content'
                    }, {
                        title: '2',
                        content: 'this is a content'
                    },
                    {
                        title: '3',
                        content: 'this is a content'
                    }, {
                        title: '4',
                        content: 'this is a content'
                    }, {
                        title: '5',
                        content: 'this is a content'
                    }, {
                        title: '6',
                        content: 'this is a content'
                    }, {
                        title: '7',
                        content: 'this is a content'
                    }, {
                        title: '8',
                        content: 'this is a content'
                    }, {
                        title: '9',
                        content: 'this is a content'
                    }, {
                        title: '10',
                        content: 'this is a content'
                    },
                ]
            }
        },
        computed: {
            visiblePages() {
                return this.rows.slice((this.page - 1) * this.perPage, this.page * this.perPage)
            }
        },
        name: 'Vote'
    }
</script>
<style scoped>
    .Block_incontent h1 {
        font-size: 1.375em;
        background-color: #fcce30;
        color: #333;
        padding: 6px 20px 6px 20px;
        position: relative;
        margin: 0 0 20px 0;
        clear: both;
        line-height: 140%;
        border-radius: 5px;
    }
</style>