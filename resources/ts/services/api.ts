import axios from 'axios';

const api = axios.create({
  baseURL: '/api'
  // validateStatus: (status): any => { return true; }
});

api.interceptors.response.use(
    response => response,
    error => {
      if (error.response && error.response.status === 401) {
        console.log(
          `Error API: ${error.response.data.message} status: ${
            error.response.status
          }`
        );
      }

      return error.response;
    }
  );

export default api;
