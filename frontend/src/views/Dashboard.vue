<template>
    <div>
        
        <!-- class="fill-height" 版面垂直致中 -->
        <v-container class="fill-height" fluid>
            <v-row align="center" justify="center">
                <v-col class="text-center">
                    <div class="content">
                        <v-flex xs-12>
                            <h2 class="text-left">投票活動</h2>
                            <hr />
                            <v-row>
                                <v-spacer></v-spacer>
                                <v-spacer></v-spacer>
                                <v-col cols="6" md="4" class="text-right">
                                    <v-btn depressed large color="primary" right @click.stop="drawer =!drawer">新增活動
                                    </v-btn>
                                </v-col>

                            </v-row>
                        </v-flex>
                        <v-flex xs12>
                            <v-card>
                                <v-card-text>
                                    <v-data-table :headers="headers" :items="desserts" :search="search"></v-data-table>
                                </v-card-text>
                            </v-card>
                        </v-flex>

                    </div>
                </v-col>
            </v-row>
        </v-container>
         <v-navigation-drawer v-model="drawer" absolute temporary clipped right width="70%">
            
        </v-navigation-drawer>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                
                drawer: null,
                items: [{
                        icon: 'trending_up',
                        text: 'Most Popular'
                    },
                    {
                        icon: 'subscriptions',
                        text: 'Subscriptions'
                    },
                    {
                        icon: 'history',
                        text: 'History'
                    },
                    {
                        icon: 'featured_play_list',
                        text: 'Playlists'
                    },
                    {
                        icon: 'watch_later',
                        text: 'Watch Later'
                    },
                ],
            }
        },
        components:{
        }
    }
</script>