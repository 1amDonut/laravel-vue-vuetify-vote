<template>
     <v-container>
          <v-row>
               <v-col cols="12">
                    <v-card color="white lighten-1" class="mb-12">
                         <v-container>
                              <v-row>
                                   <v-col cols="6">
                                        <div>
                                             <h1>Email自動通知</h1>
                                        </div>
                                   </v-col>
                                   <v-col cols="6"  class="text-right">
                                        
                                         <v-btn small  color="success" right>儲存</v-btn>
                                   </v-col>
                              </v-row>
                              <v-row>
                                   <!-- <v-col cols="2" ><span class="mx-2"></span></v-col> -->
                                   <v-col cols="12">
                                        <v-switch v-model="multiple" class="mx-2" label="通知問卷建立者"></v-switch>
                                   </v-col>
                              </v-row>
                              <v-row>
                                   <v-col cols="12">
                                        <v-switch v-model="multiple" class="mx-2" label="通知填答者"></v-switch>
                                   </v-col>
                              </v-row>
                         </v-container>

                    </v-card>

               </v-col>
          </v-row>
     </v-container>
</template>
<script>
     export default {
          data() {
               return {
                    dialog: false,
                    headers: [{
                              text: 'Dessert (100g serving)',
                              align: 'start',
                              sortable: false,
                              value: 'name',
                         },
                         {
                              text: 'Calories',
                              value: 'calories'
                         },
                         {
                              text: 'Fat (g)',
                              value: 'fat'
                         },
                         {
                              text: 'Carbs (g)',
                              value: 'carbs'
                         },
                         {
                              text: 'Protein (g)',
                              value: 'protein'
                         },
                         {
                              text: 'Actions',
                              value: 'actions',
                              sortable: false
                         },
                    ],
                    desserts: [],
                    editedIndex: -1,
                    editedItem: {
                         name: '',
                         calories: 0,
                         fat: 0,
                         carbs: 0,
                         protein: 0,
                    },
                    defaultItem: {
                         name: '',
                         calories: 0,
                         fat: 0,
                         carbs: 0,
                         protein: 0,
                    },
               }
          },
          methods: {
               initialize() {
                    this.desserts = [{
                              name: 'Frozen Yogurt',
                              calories: 159,
                              fat: 6.0,
                              carbs: 24,
                              protein: 4.0,
                         },
                         {
                              name: 'Ice cream sandwich',
                              calories: 237,
                              fat: 9.0,
                              carbs: 37,
                              protein: 4.3,
                         },
                         {
                              name: 'Eclair',
                              calories: 262,
                              fat: 16.0,
                              carbs: 23,
                              protein: 6.0,
                         },
                         {
                              name: 'Cupcake',
                              calories: 305,
                              fat: 3.7,
                              carbs: 67,
                              protein: 4.3,
                         },
                         {
                              name: 'Gingerbread',
                              calories: 356,
                              fat: 16.0,
                              carbs: 49,
                              protein: 3.9,
                         },
                         {
                              name: 'Jelly bean',
                              calories: 375,
                              fat: 0.0,
                              carbs: 94,
                              protein: 0.0,
                         },
                         {
                              name: 'Lollipop',
                              calories: 392,
                              fat: 0.2,
                              carbs: 98,
                              protein: 0,
                         },
                         {
                              name: 'Honeycomb',
                              calories: 408,
                              fat: 3.2,
                              carbs: 87,
                              protein: 6.5,
                         },
                         {
                              name: 'Donut',
                              calories: 452,
                              fat: 25.0,
                              carbs: 51,
                              protein: 4.9,
                         },
                         {
                              name: 'KitKat',
                              calories: 518,
                              fat: 26.0,
                              carbs: 65,
                              protein: 7,
                         },
                    ]
               },

               editItem(item) {
                    this.editedIndex = this.desserts.indexOf(item)
                    this.editedItem = Object.assign({}, item)
                    this.dialog = true
               },

               deleteItem(item) {
                    const index = this.desserts.indexOf(item)
                    confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
               },

               close() {
                    this.dialog = false
                    setTimeout(() => {
                         this.editedItem = Object.assign({}, this.defaultItem)
                         this.editedIndex = -1
                    }, 300)
               },

               save() {
                    if (this.editedIndex > -1) {
                         Object.assign(this.desserts[this.editedIndex], this.editedItem)
                    } else {
                         this.desserts.push(this.editedItem)
                    }
                    this.close()
               },
          },
     }
</script>