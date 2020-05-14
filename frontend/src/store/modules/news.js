// import newsServices from "@/services/news.services"
import newsServices from "../../services/news.services"
export default {
     state: {
          todo: {
               id: null,
               name: "",
               email: "",
          }
     },
     getters: {
          NEWS: state => {
               return state.todo;
          }
     },
     mutations: {
          SET_NEWS: (state, payload) => {
               state.todo = payload;
          }

     },
     actions: {
          GET_NEWS(context) {
               newsServices
                    .getAll()
                    .then(data => {
                         context.commit("SET_NEWS", data);
                         // context.commit("SET_LOADING", false);
                    }).catch(error => {
                         console.log('services error' + error);
                    });
          }

     }
}