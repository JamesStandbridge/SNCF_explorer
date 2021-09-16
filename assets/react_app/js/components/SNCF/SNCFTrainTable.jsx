import React, { useState } from 'react'
import SncfAPI from '../../services/SNCF_API/API'

const SNCFTrainTable = (props) => {
	const [url, setUrl] = useState("")

	const handleChange = ({currentTarget}) => {
		setUrl(currentTarget.value)
	}

	const handleFetch = () => {
		SncfAPI.fetch(url).then(res => {
			console.log(res)
		})
	}


	return (
		<div>
			<input onChange={handleChange} value={url} />
			<button onClick={handleFetch}>fetch</button>
			<h1>table</h1>	
		</div>
	)
}

export default SNCFTrainTable