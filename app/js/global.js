//////////////////////// /// GLOBAL VARIABLES /// ////////////////////////
var queueSongs; // Songs that are in the queue
var pageLoadTimeout; // Holds timeout for transitioning from brand tab to queue tab

/*** Prepopulate allSongs array with some songs for testing ***/
// THIS SHOULD BE MOVED TO A DATABASE
var	allSongs = [{ id: 0, artist: "Janelle Monae", title: "Many Moons", album: "Metropolis: The Chase Suite", votes: 0 },
				{ id: 1, artist: "Fun.", title: "Some Nights", album: "Some Nights", votes: 0 },
				{ id: 2, artist: "Fun.", title: "We Are Young", album: "Some Nights", votes: 0 },
				{ id: 3, artist: "MIKA", title: "Love Today", album: "Life in Cartoon Motion", votes: 0 },
				{ id: 4, artist: "Jessie J", title: "Domino", album: "Who You Are", votes: 0 }
];