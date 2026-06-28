import java.io.FileWriter;
import java.io.IOException;

public class SondageAPI {

    // les options du sondage et leurs votes
    static String[] langages = {"Java", "PHP", "Python", "JavaScript", "C++"};
    static int[] votes = {15, 12, 20, 18, 7};

    // calcule le total des votes
    public static int getTotalVotes() {
        int total = 0;
        for (int v : votes) {
            total += v;
        }
        return total;
    }

    // genere le contenu JSON
    public static String genererResultatsJson() {
        String json = "{\n";
        json += "  \"question\": \"Quel est ton langage de programmation prefere ?\",\n";
        json += "  \"options\": [\n";

        for (int i = 0; i < langages.length; i++) {
            json += "    {\"label\": \"" + langages[i] + "\", \"votes\": " + votes[i] + "}";
            if (i < langages.length - 1) json += ",";
            json += "\n";
        }

        json += "  ],\n";
        json += "  \"total\": " + getTotalVotes() + "\n";
        json += "}";
        return json;
    }

    public static void main(String[] args) {
        String json = genererResultatsJson();

        try {
            FileWriter fichier = new FileWriter("../frontend-php/resultats.json");
            fichier.write(json);
            fichier.close();
            System.out.println("resultats.json genere !");
            System.out.println("Total : " + getTotalVotes() + " votes");
        } catch (IOException e) {
            System.out.println("Erreur : " + e.getMessage());
        }
    }
}