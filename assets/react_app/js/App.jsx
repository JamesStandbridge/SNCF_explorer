import React, { useState, useEffect } from "react"
import { Provider } from 'react-redux'
import ReactDOM from "react-dom"

import Store from './store/configureStore'

import Framework from './Framework'

const App = () => {
	return (
		<Provider store={ Store }>
			<Framework />
		</Provider>
	);	
}

const rootElement = document.getElementById("root");
ReactDOM.render(<App />, rootElement);