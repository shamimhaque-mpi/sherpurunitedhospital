<?php

// set site name
$config['site_name'] = 'Sherpur United (Pvt) Hospital';
$config['site_namebn'] = '';
$config['my_database'] = 'wwwmilonelectron_unitedsherpur';

$CI = & get_instance();
$CI->load->model('action');
$CI->load->database('default');
$total_sms = $CI->action->read_sum("recharge_sms","sms");
$config['total_sms'] = ($total_sms[0]->sms == null ? 0 : $total_sms[0]->sms);
//$config['total_sms'] = 0;

// all month
$config['months'] = array(
    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
);
$config['all_months'] = array(
    '01'    => 'January',
    '02'    => 'February',
    '03'    => 'March',
    '04'    => 'April',
    '05'    => 'May',
    '06'    => 'June',
    '07'    => 'July',
    '08'    => 'August',
    '09'    => 'September',
    '10'    => 'October',
    '11'    => 'November',
    '12'    => 'December'
);

$config['gurdian'] = array(
    "Father"=>"পিতা",
    "Husband"=>"স্বামী"
); 

// Group start here
$config['groups'] = array(
    "HAEMATOLOGY"           => array("CBC/TC,DC,ESR,Hb%", "Platelet Count", "Blood Film/RBC Morphology", "Bleeding Time, Clotting Time", "circulating Eosinophil Count", "Reticulocyte Count/ RBC Count", "Blood Grouping, Cross Matching", "Malarial Parasite, Microfilariae", "PCV,MCV,MCH,MCHC", "Proghrombin Time", "Coomb`s Test", "Sickle Cell", "RBV Fragility Test", "Hb-F.Hb-H"),
    "BIOCHEMISTRY"          => array("Blood Sugar- Fasting/Random(RBS)/pp", "Blood Sugar- 90 min, after BF/ 75 gm Glucose", "Blood Sugar- 2 hrs  after BF/ 75 gm Glucose", "Blood Sugar- GTT", "Urea, BUN, Creatinine Bilirubin (Total, Direct)", "SGpt(ALT),SGOT(AST)", "Creatinine Clearance Rate", "Uric Acid, S.Calcium", "Cholesterol, Lipid Profile", "Total Protein Albumin, A/G Ratio", "S.Electrolytes"),
    "FLUIDS"                => array("CSF/Pleural/Peritoneas:", "Cytology, Gram Stain, AFB C/S Protein, Sugar", "Semen:", "Analysis, Gram Stain, C/S"),
    "STOOL"                 => array("R/E,M/E,R/s,OBT,C/S"),
    "URINE"                 => array("R/E,M/E & C/S", "Specific Gravity", "Total Protein (24 hrs)", "Bile Salts/ Bile Pigments", "Urobilinogen", "Bence-jone`s Protein", "Pregnancy Test", "Ketone Bodies", "Homogentisic Acid", "Microfilariae"),
    "MICROBIOLOGY"          => array("Urine C/S Stool C/S, Blood C/S Pus-", "Gram Sta9in, Fungus, AFB, C/S /eye/Ear/Nasal Swab-", "Fungus, Gram Stain, C/S HVS/ Cervical Smear-", "Fungus, Gram Stain, C/S PS/US-Gram Stain, C/S Throat Swab-", "Gram Stain, KLB, Fungus, C/S sputum-", "Gram Stain, AFB,Fungus, C/S Skin Scraping-", "Fungus, Hansen`s Bacilli"),
    "IMMUNOLOGY"            => array("Blood Group(ABO & RhD), Cross Matching", "Urine Pregnancy (HCG) Test", "ASO Titre, Widal Test,", "Rf (RA) Test", "CRP, HBsAg,", "MT (Tuberculin Test)", "VDRL, TPHA", "Aldehyde test, Chopra Test", "HIV, Hexagon TB"),
    "HORMONE"               => array("T3 T4 TSH"),
    "ECG"                   => array("ECG"),
    "EEG"                   => array("EEG"),
    "ECHOCARDIOGRAPHY"      => array("ECHOCARDIOGRAPHY"),
    "X-RAY(NORMAL/DIGITAL)" => array("Abdomen Erect/Supine/ Lateral", "Chest-pa/ AP/ Latreal/ Obilique", "KUB-AP/ Lateral", "PNS-OM View", "Skull-PA/ AP/ Lateral", "Cervical Spine-PA/Lateral", "Lumbo-Sacral Spine-", "Dorso-Lubmer Spine-", "Shoulder joint-PA/Lateral", "ankle joint-PA/Lateral", "Knee Joint -PA/ Lateral", "Pelvis-PA Lateral", "Elbow-PA/Lateral", "Elbow-PA Lateral", "Foot-PA/ Lateral", "Hand-PA/Lateral", "Wrist-PA/Lateral", "Mastoid-PA/Lateral", "Brest/Tumour/Swelling", "Nasopharynx-PA/Lateral", "Maxilla & Mandible-PA/Lateral", "Temporo-Mandibular Joint-", "Sinogram/ Fistulogram", "IVU/IVP", "Ba-Meal Stomach & Dudenum", "Ba-Swallow of Oesophaus", "Ba-Enema Large Gut"),
    "ULTRASONOGRAPHT"       => array("HBS (Liver, G-Bladder, Biliary Channels)", "Pancreas, Spleen", "Whole Abdomen", "Upper Abdomen/Lwer Abdomen", "KUB", "Prostate", "Testes", "Uterus, Ovries and Adnaxae", "Confirmation of Pregnnancy", "Pregnancy Profile", "Breast", "Thyroid", "Brain")
);
// Group start here

// Designation
$config['desigation'] = array(
    'Director', 'Office Assistant', 'Accountant', 'Security Gard'
);

//Doctor Desigation                                  
$config['doctor_desigation'] = array(
    'Certified Asthma Educator', 'Adult Nurse Practitioner', 'Certified Athletic Trainer', 'Bachelor of Science in Nursing'
);

//Doctor Specialised in                                  
$config['specialised_in'] = array(
    'Allergist', 'Cardiologist', 'Dermatologist', 'Neurologist'
);

// Cost purpose
$config['cost_purpose'] = array (
    'Employee Salary', 'Rent', 'Maintenance', 'Electricity Bill', 'Store Rent', 'Labor Cost'
);

// privilege
$config['privilege'] = array('super', 'admin', 'user');

//Developer Access
$config["developer"] = array(
    "username" => "freelanceitlab",
    "password" => "freelanceitlab" //#D~8WO7LLkX#
);

$config["days"] = array(
    "Saturday"  => "শনিবার",
    "Sunday"    => "রবিবার",
    "Monday"    => "সোমবার",
    "Tuesday"   => "মঙ্গলবার",
    "Wednesday" => "বুধবার",
    "Thursday"  => "বৃহস্পতিবার",
    "Friday"    => "শুক্রবার"
);

// ward type
$config['wards']=array(
    "Ward Type 1", "Ward Type 2", "Ward Type 3"
);

// cabin type
$config['cabins']=array(
    "Cabin Type 1", "Cabin Type 2", "Cabin Type 3"
);

$config['salarytype']=array(
    "Monthly", "Daily"
);

$config['fields'] = array();

$config["dist_upozila"] = array(
        "Dhaka"       => array("Dhamrai ", "Dohar ", "Keraniganj ", "Nawabganj ", "Savar "),
        "Faridpur"    => array("Faridpur Sodar ", "Boalmari ", "Alfadanga ", "Madhukhali ", "Bhanga ", "Nagarkanda ", "Charbhadrasan ", "Sodarpur ", "Shaltha "),
        "Gazipur"     => array("Gazipur Sodar-Joydebpur", "Kaliakior", "Kapasia", "Sripur", "Kaliganj", "Tongi"),
        "Gopalganj"   => array("Gopalganj Sodar ", "Kashiani ", "Kotalipara ", "Muksudpur ", "Tungipara "),
        "Jamalpur"    => array("Dewanganj ", "Baksiganj ", "Islampur ", "Jamalpur Sodar ", "Madarganj ", "Melandaha ", "Sarishabari ", "Narundi Police I.C"),
        "Kishoreganj" => array("Astagram ", "Bajitpur ", "Bhairab ", "Hossainpur ", "Itna ", "Karimganj ", "Katiadi ", "Kishoreganj Sodar ", "Kuliarchar ", "Mithamain ", "Nikli ", "Pakundia ", "Tarail "),
        "Madaripur"   => array("Madaripur Sodar", "Kalkini", "Rajoir", "Shibchar"),
        "Manikganj"   => array("Manikganj Sodar ", "Singair ", "Shibalaya ", "Saturia ", "Harirampur ", "Ghior ", "Daulatpur "),
        "Munshiganj"  => array("Lohajang ", "Sreenagar ", "Munshiganj Sodar ", "Sirajdikhan ", "Tongibari ", "Gazaria "),
        "Mymensingh"  => array("Bhaluka", "Trishal", "Tarakanda","Haluaghat", "Muktagacha", "Dhobaura", "Fulbaria", "Gaffargaon", "Gauripur", "Ishwarganj", "Mymensingh Sodar", "Nandail", "Fulpur"),
        "Narayanganj" => array("Araihazar ", "Sonargaon ", "Bandar", "Naryanganj Sodar ", "Rupganj ", "Siddirgonj "),
        "Narsingdi"   => array("Belabo ", "Monohardi ", "Narsingdi Sodar ", "Palash ", "Raipura , Narsingdi", "Shibpur "),
        "Netrokona"   => array("Kendua", "Atpara", "Barhatta", "Durgapur", "Kalmakanda", "Madan", "Mohanganj", "Netrakona-S", "Purbadhala", "Khaliajuri"),
        "Rajbari"     => array("Baliakandi ", "Goalandaghat ", "Pangsha ", "Kalukhali ", "Rajbari Sodar "),
        "Shariatpur"  => array("Shariatpur Sodar -Palong", "Damudya ", "Naria ", "Jajira ", "Bhedarganj ", "Gosairhat "),
        "Sherpur"     => array("Jhenaigati ", "Nakla ", "Nalitabari ", "Sherpur Sodar ", "Sreebardi "),
        "Tangail"     => array("Tangail Sodar ", "Sakhipur ", "Basail ", "Madhupur ", "Ghatail ", "Kalihati ", "Nagarpur ", "Mirzapur ", "Gopalpur ", "Delduar ", "Bhuapur ", "Dhanbari "),
        "Bogra"       => array("Adamdighi", "Bogra Sodar", "Sherpur", "Dhunat", "Dhupchanchia", "Gabtali", "Kahaloo", "Nandigram", "Sahajanpur", "Sariakandi", "Shibganj", "Sonatala"),
        "Joypurhat"   => array("Joypurhat S", "Akkelpur", "Kalai", "Khetlal", "Panchbibi"),
        "Naogaon"     => array("Naogaon Sodar ", "Mohadevpur ", "Manda ", "Niamatpur ", "Atrai ", "Raninagar ", "Patnitala ", "Dhamoirhat ", "Sapahar ", "Porsha ", "Badalgachhi "),
        "Natore"      => array("Natore Sodar ", "Baraigram ", "Bagatipara ", "Lalpur ", "Natore Sodar ", "Baraigram "),
        "Nawabganj"   => array("Bholahat ", "Gomastapur ", "Nachole ", "Nawabganj Sodar ", "Shibganj "),
        "Pabna"       => array("Atgharia ", "Bera ", "Bhangura ", "Chatmohar ", "Faridpur ", "Ishwardi ", "Pabna Sodar ", "Santhia ", "Sujanagar "),
        "Rajshahi"    => array("Bagha", "Bagmara", "Charghat", "Durgapur", "Godagari", "Mohanpur", "Paba", "Puthia", "Tanore"),
        "Sirajgonj"   => array("Sirajganj Sodar ", "Belkuchi ", "Chauhali ", "Kamarkhanda ", "Kazipur ", "Raiganj ", "Shahjadpur ", "Tarash ", "Ullahpara "),
        "Dinajpur"    => array("Birampur ", "Birganj", "Biral ", "Bochaganj ", "Chirirbandar ", "Phulbari ", "Ghoraghat ", "Hakimpur ", "Kaharole ", "Khansama ", "Dinajpur Sodar ", "Nawabganj", "Parbatipur "),
        "Gaibandha"   => array("Fulchhari", "Gaibandha Sodar", "Gobindaganj", "Palashbari", "Sadullapur", "Saghata", "Sundarganj"),
        "Kurigram"    => array("Kurigram Sodar", "Nageshwari", "Bhurungamari", "Phulbari", "Rajarhat", "Ulipur", "Chilmari", "Rowmari", "Char Rajibpur"),
        "Lalmonirhat" => array("Lalmanirhat Sodar", "Aditmari", "Kaliganj", "Hatibandha", "Patgram"),
        "Nilphamari"  => array("Nilphamari Sodar", "Saidpur", "Jaldhaka", "Kishoreganj", "Domar", "Dimla"),
        "Panchagarh"  => array("Panchagarh Sodar", "Debiganj", "Boda", "Atwari", "Tetulia"),
        "Rangpur"     => array("Badarganj", "Mithapukur", "Gangachara", "Kaunia", "Rangpur Sodar", "Pirgachha", "Pirganj", "Taraganj"),
        "Thakurgaon"  => array("Thakurgaon Sodar ", "Pirganj ", "Baliadangi ", "Haripur ", "Ranisankail "),
        "Barguna"     => array("Amtali ", "Bamna ", "Barguna Sodar ", "Betagi ", "Patharghata ", "Taltali "),
        "Barisal"     => array("Muladi ", "Babuganj ", "Agailjhara ", "Barisal Sodar ", "Bakerganj ", "Banaripara ", "Gaurnadi ", "Hizla ", "Mehendiganj ", "Wazirpur "),
        "Bhola"       => array("Bhola Sodar ", "Burhanuddin ", "Char Fasson ", "Daulatkhan ", "Lalmohan ", "Manpura ", "Tazumuddin "),
        "Jhalokati"   => array("Jhalokati Sodar ", "Kathalia ", "Nalchity ", "Rajapur "),
        "Patuakhali"  => array("Bauphal ", "Dashmina ", "Galachipa ", "Kalapara ", "Mirzaganj ", "Patuakhali Sodar ", "Dumki ", "Rangabali "),
        "Pirojpur"    => array("Bhandaria", "Kaukhali", "Mathbaria", "Nazirpur", "Nesarabad", "Pirojpur Sodar", "Zianagar"),
        "Bandarban"   => array("Bandarban Sodar", "Thanchi", "Lama", "Naikhongchhari", "Ali kadam", "Rowangchhari", "Ruma"),
        "Brahmanbaria"=> array("Brahmanbaria Sodar ", "Ashuganj ", "Nasirnagar ", "Nabinagar ", "Sarail ", "Shahbazpur Town", "Kasba ", "Akhaura ", "Bancharampur ", "Bijoynagar "),
        "Chandpur"    => array("Chandpur Sodar", "Faridganj", "Haimchar", "Haziganj", "Kachua", "Matlab Uttar", "Matlab Dakkhin", "Shahrasti"),
        "Chittagong"  => array("Anwara ", "Banshkhali ", "Boalkhali ", "Chandanaish ", "Fatikchhari ", "Hathazari ", "Lohagara ", "Mirsharai ", "Patiya ", "Rangunia ", "Raozan ", "Sandwip ", "Satkania ", "Sitakunda "),
        "Comilla"     => array("Barura ", "Brahmanpara ", "Burichong ", "Chandina ", "Chauddagram ", "Daudkandi ", "Debidwar ", "Homna ", "Comilla Sodar ", "Laksam ", "Monohorgonj ", "Meghna ", "Muradnagar ", "Nangalkot ", "Comilla Sodar South ", "Titas "),
        "Coxs Bazar" => array("Chakaria", "Coxs Bazar Sodar", "Kutubdia", "Maheshkhali", "Ramu", "Teknaf", "Ukhia", "Pekua"),
        "Feni"        => array("Feni Sodar", "Chagalnaiya", "Daganbhyan", "Parshuram", "Fhulgazi", "Sonagazi"),
        "Khagrachari" => array("Dighinala", "Khagrachhari", "Lakshmichhari", "Mahalchhari", "Manikchhari", "Matiranga", "Panchhari", "Ramgarh"),
        "Lakshmipur"  => array("Lakshmipur Sodar", "Raipur", "Ramganj", "Ramgati", "Komol Nagar"),
        "Noakhali"    => array("Noakhali Sodar", "Begumganj", "Chatkhil", "Companyganj", "Shenbag", "Hatia", "Kobirhat", "Sonaimuri", "Suborno Char"),
        "Rangamati"   => array("Rangamati Sodar", "Belaichhari", "Bagaichhari", "Barkal", "Juraichhari", "Rajasthali", "Kaptai", "Langadu", "Nannerchar", "Kaukhali"),
        "Habiganj"    => array("Ajmiriganj", "Baniachang", "Bahubal", "Chunarughat", "Habiganj Sodar", "Lakhai", "Madhabpur", "Nabiganj", "Shaistagonj Upazila"),
        "Maulvibazar" => array("Moulvibazar Sodar", "Barlekha", "Juri", "Kamalganj", "Kulaura", "Rajnagar", "Sreemangal"),
        "Sunamganj"   => array("Bishwamvarpur", "Chhatak", "Derai", "Dharampasha", "Dowarabazar", "Jagannathpur", "Jamalganj", "Sulla", "Sunamganj Sodar", "Shanthiganj", "Tahirpur"),
        "Sylhet"      => array("Sylhet Sodar", "Beanibazar", "Bishwanath", "Dakshin Surma Upazila", "Balaganj", "Companiganj", "Fenchuganj", "Golapganj", "Gowainghat", "Jaintiapur", "Kanaighat", "Zakiganj", "Nobigonj"),
        "Bagerhat"    => array("Bagerhat Sodar", "Chitalmari", "Fakirhat", "Kachua", "Mollahat", "Mongla", "Morrelganj", "Rampal", "Sarankhola"),
        "Chuadanga"   => array("Damurhuda", "Chuadanga-S", "Jibannagar", "Alamdanga"),
        "Jessore"     => array("Abhaynagar", "Keshabpur", "Bagherpara", "Jessore Sodar", "Chaugachha", "Manirampur", "Jhikargachha", "Sharsha"),
        "Jhenaidah"   => array("Jhenaidah Sodar", "Maheshpur", "Kaliganj", "Kotchandpur", "Shailkupa", "Harinakunda"),
        "Khulna"      => array("Terokhada", "Batiaghata", "Dacope", "Dumuria", "Dighalia", "Koyra", "Paikgachha", "Phultala", "Rupsa"),
        "Kushtia"     => array("Kushtia Sodar", "Kumarkhali", "Daulatpur", "Mirpur", "Bheramara", "Khoksa"),
        "Magura"      => array("Magura Sodar", "Mohammadpur", "Shalikha", "Sreepur"),
        "Meherpur"    => array("angni", "Mujib Nagar", "Meherpur-S"),
        "Narail"      => array("Narail-S", "Lohagara", "Kalia"),
        "Satkhira"    => array("Satkhira Sodar", "Assasuni", "Debhata", "Tala", "Kalaroa", "Kaliganj", "Shyamnagar")
);

$config["type"] = array("Tablet","Syrup","Cream");

$config['duration'] = array(
    "7 days",
    "10 days",
    "15 days",
    "20 days",
    "25 days",
    "1 month",
    "2 Months"
);

$config["rules"] = array(
    "0+0+1",
    "0+0+1/2",
    "0+1+1",
    "0+1/2+1/2",
    "0+1+0",
    "0+1/2+0",
    "1+0+1",
    "1/2+0+1/2",
    "1+0+0",
    "1/2+0+0",
    "1+1+0",
    "1/2+1/2+0",
    "1+1+1",
    "1/2+1/2+1/2"
);

$config['notes'] = array(
    "Before take Breakfast", "After take Breakfast", "Before take Lunch", "After take Lunch", "Before take Dinner", "After take Dinner"
);

