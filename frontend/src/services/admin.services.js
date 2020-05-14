import $http from "./config";
const RESOURCE_NAME = "/admin";
export default {
     async getClassify() {
          try {
              let JWTToken = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2FwaVwvbG9naW4iLCJpYXQiOjE1ODk0NDk0NDQsImV4cCI6MTU4OTQ1MzA0NCwibmJmIjoxNTg5NDQ5NDQ0LCJqdGkiOiI2OWJaYWo5WnNGUUQyTWFHIiwic3ViIjoicm9vdDEyMyIsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.YV16QPPjNBklMrX6jBYTcl0I-uAFZusMSfeSslZTVLM";
               let response = await $http.get(RESOURCE_NAME+'/getClassify',{
                   headers:{
                       'Authorization':`Bearer ${JWTToken}`
                   }
               });
               let data = response.data;
               return data;
          } catch (error) {
               console.log(error.response);
          }
     }
}