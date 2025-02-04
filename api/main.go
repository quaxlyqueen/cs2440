package main

import (
	"github.com/joho/godotenv"
	"log"
	"net/http"
	"os"
	"strings"
)

func main() {

	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		err := godotenv.Load("../music/explore/.env")
		if err != nil {
			log.Fatalf("Error loading .env file: %s", err)
		}

		client_id := os.Getenv("SPOTIFY_CLIENT_ID")
		redirect_uri := "https://cs2440.joshashton.dev/music/explore"
		//redirect_uri := "http://localhost/music/explore"
		scope := "user-top-read"

		redirectURL := "https://accounts.spotify.com/authorize?" + strings.Join([]string{
			"response_type=code",
			"client_id=" + client_id,
			"scope=" + scope,
			"redirect_uri=" + redirect_uri,
		}, "&")

		http.Redirect(w, r, redirectURL, http.StatusFound)
	})

	http.ListenAndServe(":9753", nil)
}
