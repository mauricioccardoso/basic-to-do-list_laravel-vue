import type { AxiosInstance } from 'axios'
import axios from 'axios'

const httpClient: AxiosInstance = axios.create({
  baseURL: 'http://localhost:8080/api/'
})

httpClient.interceptors.request.use((config) => {
  return config
})

export default httpClient
