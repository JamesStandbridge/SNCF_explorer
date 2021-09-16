

const HeaderBuilder = {

	POST_HEADER: function() {
		return {
			"Content-type": "application/json",
			"method": "POST"
		}
	},

	GET_HEADER: function() {
		return {
			"Content-type": "application/json",
			"method": "GET",
		}
	}
}

export default HeaderBuilder