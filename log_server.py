# log_server.py
import http.server
import socketserver

PORT = 1234

class MyRequestHandler(http.server.SimpleHTTPRequestHandler):
    # Kita modifikasi method do_GET untuk mencetak header
    def do_GET(self):
        # Cetak User-Agent yang diterima ke terminal
        print("\n--- Request Diterima ---")
        print(f"Path: {self.path}")
        print(f"User-Agent: {self.headers['User-Agent']}")
        print("------------------------")
        
        # Jalankan fungsi asli untuk melayani file
        super().do_GET()

# Boilerplate untuk menjalankan server
with socketserver.TCPServer(("", PORT), MyRequestHandler) as httpd:
    print(f"Server logging berjalan di port {PORT}")
    print("Gunakan Ctrl+C untuk berhenti.")
    httpd.serve_forever()
