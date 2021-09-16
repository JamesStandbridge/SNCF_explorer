import HttpService from "../axios/AxiosService"
import HeaderBuilder from "./HeaderBuilder"
import RequestBuilder from "./RequestBuilder"

const API = {










	fetch: async function(url) {
		const res = await HttpService.sendGetRequest(
			url,
			HeaderBuilder.GET_HEADER(),
		)
		return res
	},
}

export default API;