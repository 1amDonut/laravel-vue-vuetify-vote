<template>
     <v-container>
          <v-row>
               <v-col cols="12">
                    <v-card color="white lighten-1" class="mb-12">
                         <v-container>
                              <v-row>
                                   <v-col cols="6">
                                        <div>
                                             <h1>報表匯出</h1>
                                        </div>
                                   </v-col>
                                   <v-col cols="6" class="text-right">
                                        <v-btn :loading="loading3" :disabled="loading3" color="blue-grey"
                                             class="ma-2 white--text" @click="loader = 'loading3'">
                                             下載
                                             <v-icon right dark>mdi-cloud-download</v-icon>
                                        </v-btn>
                                        <v-btn :loading="loading3" :disabled="loading3" color="error"
                                             class="ma-2 white--text" @click="loader = 'loading3'">
                                             匯出
                                             <v-icon right dark>mdi-file-pdf-box-outline</v-icon>
                                        </v-btn>
                                        <v-btn :loading="loading3" :disabled="loading3" color="success"
                                             class="ma-2 white--text" @click="loader = 'loading3'">
                                             匯出
                                             <v-icon right dark>mdi-microsoft-excel</v-icon>
                                        </v-btn>
                                   </v-col>
                                   <v-form v-model="valid">
                                        <v-container>
                                             <v-row>
                                                  <v-col cols="12" md="4">
                                                       <v-select :items="items" label="Outlined style" outlined>
                                                       </v-select>
                                                  </v-col>

                                                  <v-col cols="12" md="4">
                                                       <v-select :items="items" label="Outlined style" outlined>
                                                       </v-select>
                                                  </v-col>

                                                  <v-col cols="12" md="4">
                                                       <v-select :items="items" label="Outlined style" outlined>
                                                       </v-select>
                                                  </v-col>
                                             </v-row>
                                        </v-container>
                                   </v-form>
                              </v-row>
                              <!-- data table -->
                              <v-data-table :headers="headers" :items="desserts" sort-by="calories" class="elevation-1">
                                   <template v-slot:top>
                                        <v-toolbar flat color="white">
                                             <v-dialog v-model="dialog" max-width="500px">

                                                  <v-card>
                                                       <v-card-title>
                                                            <span class="headline">{{ formTitle }}</span>
                                                       </v-card-title>

                                                       <v-card-text>
                                                            <v-container>
                                                                 <v-row>
                                                                      <v-col cols="12" sm="6" md="12">
                                                                           <v-text-field v-model="editedItem.name"
                                                                                label="名稱">
                                                                           </v-text-field>
                                                                      </v-col>
                                                                      <v-col cols="12" sm="6" md="12">
                                                                           <v-text-field v-model="editedItem.calories"
                                                                                label="註釋">
                                                                           </v-text-field>
                                                                      </v-col>

                                                                      <v-col cols="12" sm="6" md="12">
                                                                           <v-file-input label="File input" ref="files"
                                                                                outlined dense v-model="file"
                                                                                @change="handleFileUpload()">
                                                                           </v-file-input>
                                                                      </v-col>
                                                                 </v-row>
                                                            </v-container>
                                                       </v-card-text>

                                                       <v-card-actions>
                                                            <v-spacer></v-spacer>
                                                            <v-btn color="blue darken-1" text @click="close">取消</v-btn>
                                                            <v-btn color="blue darken-1" text @click="save">儲存</v-btn>
                                                       </v-card-actions>
                                                  </v-card>
                                             </v-dialog>
                                        </v-toolbar>
                                   </template>
                                   <template v-slot:item.actions="{ item }">
                                        <v-icon small class="mr-2" @click="editItem(item)">
                                             mdi-pencil
                                        </v-icon>
                                        <v-icon small @click="deleteItem(item)">
                                             mdi-delete
                                        </v-icon>
                                   </template>
                                   <template v-slot:no-data>
                                        <v-btn color="primary" @click="initialize">Reset</v-btn>
                                   </template>
                              </v-data-table>
                             
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