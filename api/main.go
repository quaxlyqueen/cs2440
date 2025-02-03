package main

import (
	"crypto/rand"
	"fmt"
	"github.com/joho/godotenv"
	"log"
	"net/http"
	"os"
	"strings"
)

func generateRandomString(length int) string {
	var b = make([]byte, length)
	rand.Read(b)
	return fmt.Sprintf("%x", b)
}

func main() {

	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		err := godotenv.Load("../music/.env")
		if err != nil {
			log.Fatalf("Error loading .env file: %s", err)
		}

		client_id := os.Getenv("SPOTIFY_CLIENT_ID")
		redirect_uri := "https://cs2440.joshashton.dev/music"
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
