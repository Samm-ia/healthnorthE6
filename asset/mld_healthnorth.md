PATIENTS (
   id_patient : INT, PK
   nom : VARCHAR(50)
   prenom : VARCHAR(50)
   date_naissance : DATE
   adresse : VARCHAR(255)
   telephone : VARCHAR(20)
   email : VARCHAR(100)
)
MEDECINS (
   id_medecin : INT, PK
   nom : VARCHAR(50)
   prenom : VARCHAR(50)
   email : VARCHAR(100)
   specialite : VARCHAR(100)
)
SECRETAIRES (
   id_secretaire : INT, PK
   nom : VARCHAR(50)
   prenom : VARCHAR(50)
   email : VARCHAR(100)
)
LABORATOIRES (
   id_labo : INT, PK
   nom_labo : VARCHAR(100)
   adresse : VARCHAR(255)
   email : VARCHAR(100)
)
RENDEZVOUS (
   id_rdv : INT, PK
   date_rdv : DATE
   heure_rdv : TIME
   id_patient : INT, FK → PATIENTS(id_patient)
   id_medecin : INT, FK → MEDECINS(id_medecin)
   id_secretaire : INT, FK → SECRETAIRES(id_secretaire)
)
ORDONNANCES (
   id_ordonnance : INT, PK
   date_ordonnance : DATE
   contenu : TEXT
   id_patient : INT, FK → PATIENTS(id_patient)
   id_medecin : INT, FK → MEDECINS(id_medecin)
)
EXAMENS (
   id_examen : INT, PK
   type_examen : VARCHAR(100)
   date_examen : DATE
   resultat : TEXT
   id_patient : INT, FK → PATIENTS(id_patient)
   id_labo : INT, FK → LABORATOIRES(id_labo)
   id_medecin : INT, FK → MEDECINS(id_medecin)
)
