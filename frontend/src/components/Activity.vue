<template>

    <v-list subheader >
        <v-list-item two-line :class="{active:activity.vote}"  @click="handleClick">
            <template>
                <v-list-item-action>
                    <v-checkbox color="cyan" v-model="activity.vote">
                    </v-checkbox>
                </v-list-item-action>

                <v-list-item-content>
                    <v-list-item-title>
                        <h3>{{activity.title}}</h3>
                    </v-list-item-title>
                    <v-list-item-subtitle></v-list-item-subtitle>
                </v-list-item-content>
            </template>

        </v-list-item>
        <v-divider></v-divider>
    </v-list>



    <!-- <v-flex sm4 pl-2 pr-2>
        <v-card class="mx-auto my-4" max-width="344" outlined>
            <v-list-item three-line>
                <v-list-item-content>
                    <div class="overline mb-4"></div>
                    <v-list-item-title class="headline mb-1">{{activity.title}}</v-list-item-title>
                    <v-list-item-subtitle></v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-avatar tile size="80" color="grey"></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
                 <v-checkbox color="cyan"  v-model="activity.vote">
                    </v-checkbox>
            </v-card-actions>
        </v-card>
    </v-flex> -->
</template>
<script>
    export default {
        name: 'Activity',
        props: ['activity'],

        methods: {
            handleClick() {
                this.$emit('childMethod');
            }
        }
    }
</script>