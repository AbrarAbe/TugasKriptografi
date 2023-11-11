import tkinter as tk

def dekripsi():
    try:
        teks_enkripsi = input_text.get()
        pergeseran = int(pergeseran_entry.get())

        teks_dekripsi = ''
        for letter in teks_enkripsi:
            if letter.isalpha():
                nilai_pergeseran = ord(letter) - pergeseran

                if letter.islower():
                    if nilai_pergeseran < ord('A'):
                        nilai_pergeseran += 26
                elif letter.isupper():
                    if nilai_pergeseran < ord('A'):
                        nilai_pergeseran += 26

                teks_dekripsi += chr(nilai_pergeseran)
            else:
                teks_dekripsi += letter

        output_label['text'] = teks_dekripsi
    except ValueError:
        output_label['text'] = 'Masukkan nilai pergeseran yang valid'

window = tk.Tk()
window.title('Dekripsi Caesar Cipher')
window.geometry('400x300')

input_label = tk.Label(window, text='Masukkan teks enkripsinya:')
input_label.pack()

input_text = tk.Entry(window)
input_text.pack()

pergeseran_label = tk.Label(window, text='Nilai Pergeseran:')
pergeseran_label.pack()

pergeseran_entry = tk.Entry(window)
pergeseran_entry.pack()

tombol_dekripsi = tk.Button(window, text='Dekripsikan', command=dekripsi)
tombol_dekripsi.pack()

output_label = tk.Label(window, text='')
output_label.pack()

window.mainloop()
