import Axios from "axios";



const axiosInst = Axios.create({
  baseURL: "http://127.0.0.1:8000/api"
})

axiosInst.interceptors.response.use(function (response) {
  const { message } = response.data;
  if (message) {
    if (message.status) {
      window.toast(message.text, {
        variant: "success"
      })
    }
    else {
      window.toast(message.text, {
        variant: "error"
      })
    }
  }
  // Any status code that lie within the range of 2xx cause this function to trigger
  // Do something with response data
  return response;
}, function (error) {
  // Any status codes that falls outside the range of 2xx cause this function to trigger
  // Do something with response error
  return Promise.reject(error);
});

export { axiosInst }