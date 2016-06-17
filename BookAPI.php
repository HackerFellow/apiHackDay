<?PHP
class BookAPI{
	private $apiRoot = "http://isbndb.com/api/v2/json/J6FR9HT6";
	//API key courtesy of ansarob on SO: http://stackoverflow.com/q/24602341/2423187
	private $apiTail = "&opt=keystats&opt=responsetime";


	//Args array has query,page,index,type
	public function search($args){
		//Sets defaults where input doesn't exist.
		//This will only add if the index doesn't exist?
		$args += [
			"page" => 0,
			"index" => null,
			"type" => "books"
		];
		extract($args);
		//Now check we have a query
		if(!isset($query)){
			echo "NEED TO HAVE A QUERY IN SEARCH";
			exit(1);
		}
		//Create url for search
		$url = "$this->apiRoot/$type?q=$query&p=$page" . ($index === null ? "" : "&i=$index") . $this->apiTail;

		//Run search, return json as array
		//return file_get_contents($url);
		return apiSampleSearch();
	}//end search
}//end class


function apiSampleSearch(){
	return <<<SAMPLE
{
   "responsetime" : "Response generated in: 422.843994140625ms",
   "page_count" : 236,
   "index_searched" : "title",
   "data" : [
      {
         "publisher_id" : "technical_software_inc",
         "book_id" : "yes_a15",
         "publisher_name" : "Technical Software Inc",
         "title_latin" : "Yes",
         "author_data" : [
            {
               "id" : "alexander_munzel",
               "name" : "Alexander Munzel"
            }
         ],
         "awards_text" : "",
         "isbn10" : "0967256607",
         "urls_text" : "",
         "isbn13" : "9780967256603",
         "subject_ids" : [
            "biographies_memoirs"
         ],
         "dewey_normal" : "0",
         "edition_info" : "Paperback; 1999-08-01",
         "marc_enc_level" : "~",
         "language" : "",
         "title" : "Yes",
         "notes" : "",
         "publisher_text" : "Technical Software Inc.",
         "physical_description_text" : "5.4\"x8.2\"x0.9\"; 0.9 lb; 379 pages",
         "title_long" : "",
         "summary" : "Exciting autobiography of Alexander Munzel who grew up in Nazi Germany where he began at an early age to resist their ways, going so far as to ignore a draft order and become a deserter who could be shot. After the war he tried to escape from Germany by becoming a stowaway but was caught. Eventually he emigrated to Canada and worked at hard labor jobs while learning English from sermons on an old radio. He returned to school and became a successful architect and businessman, but throughout his life he always did things the hard way and had many adventures, preferring to challenge himself in order to grow from the experience.",
         "dewey_decimal" : "",
         "lcc_number" : ""
      },
      {
         "dewey_decimal" : "291",
         "lcc_number" : "",
         "summary" : "The dramatic life story of an Israeli woman who falls and rises again because of one word-YES! Dominiquae had been a trainer in the Israeli Army, as a young mother of two and health-store-owner she found herself battling for the life of her mentally sick husband. Life was hard she needed answers, she asked a ouija board, the spirits answered and she found herself in a hurricane of spiritual powers stronger than herself...They were trying to rule her. At the waters of the Sea of Galilee she met Him. �Run for your life,� He said. She ran and found herself immersed in His love! She said, �YES� but would it work? She was Jewish and He a Christian...Or was He? Dominiquae Bierman is an Israeli Jew, a mother, a wife and a mentor of thousands. She has traveled extensively throughout many nations speaking and demonstrating the power of the loving Creator to restore the most broken of lives. She has a PhD in Religious Philosophy and a BsC in Nutrition and Health. Her books on the Jewish Roots of Christianity have been translated into many languages, and her music CD's in Hebrew, English and Spanish are sung by the young and the old alike. She is a living proof that The God of Israel is REAL!",
         "physical_description_text" : "5.5\"x8.5\"x0.6\"; 0.9 lb; 212 pages",
         "title_long" : "",
         "notes" : "",
         "publisher_text" : "Xulon Press",
         "language" : "",
         "title" : "\"YES!\"",
         "isbn13" : "9781606479889",
         "subject_ids" : [
            "religion_spirituality_spirituality"
         ],
         "dewey_normal" : "291",
         "marc_enc_level" : "~",
         "edition_info" : "Hardcover; 2008-10-27",
         "publisher_name" : "Xulon Press",
         "isbn10" : "1606479881",
         "author_data" : [
            {
               "id" : "dominiquae_bierman",
               "name" : "Dominiquae Bierman"
            }
         ],
         "awards_text" : "",
         "title_latin" : "\"YES!\"",
         "urls_text" : "",
         "publisher_id" : "xulon_press",
         "book_id" : "yes_a16"
      },
      {
         "lcc_number" : "",
         "dewey_decimal" : "",
         "summary" : "In a picture book filled with surprises, toddlers join the search for the mother of an egg and find that inside of the egg, there is a book.",
         "physical_description_text" : "32 pages",
         "title_long" : "",
         "notes" : "",
         "publisher_text" : "Impact Books Ltd",
         "language" : "",
         "title" : "Yes",
         "dewey_normal" : "0",
         "edition_info" : "Hardcover; 1993-07-29",
         "marc_enc_level" : "~",
         "isbn13" : "9781874687214",
         "subject_ids" : [
            "childrens_books_reference_nonfiction_language_arts"
         ],
         "urls_text" : "",
         "publisher_name" : "Impact Books Ltd",
         "awards_text" : "",
         "title_latin" : "Yes",
         "author_data" : [
            {
               "id" : "goffin_josse",
               "name" : "Goffin, Josse"
            }
         ],
         "isbn10" : "1874687218",
         "book_id" : "yes_a19",
         "publisher_id" : "impact_books_ltd"
      },
      {
         "summary" : "If John hadn't experienced more noes since his last book, Leading Leaders to Leadership, he wouldn't have anything more to share with you. We wouldn't have published this book either! It's simple. If you're not out there getting more noes you won't achieve the success you want. Going through but, more importantly, growing through the noes is the way of success! When you embrace no you'll grow, and the yeses that shape your future will come into your life.",
         "lcc_number" : "",
         "dewey_decimal" : "",
         "notes" : "",
         "publisher_text" : "Possibility Press",
         "physical_description_text" : "5.3\"x8.0\"x0.5\"; 0.3 lb; 144 pages",
         "title_long" : "",
         "dewey_normal" : "0",
         "marc_enc_level" : "~",
         "edition_info" : "Paperback; 2009-08-01",
         "isbn13" : "9780938716716",
         "subject_ids" : [
            "health_mind_body_self_help"
         ],
         "language" : "",
         "title" : "Yes!",
         "book_id" : "yes_a17",
         "publisher_id" : "possibility_press",
         "urls_text" : "",
         "publisher_name" : "Possibility Press",
         "author_data" : [
            {
               "id" : "fuhrman_john_c",
               "name" : "Fuhrman, John C."
            }
         ],
         "title_latin" : "Yes!",
         "isbn10" : "0938716719",
         "awards_text" : ""
      },
      {
         "title" : "Yes",
         "language" : "",
         "subject_ids" : [
            "literature_fiction"
         ],
         "isbn13" : "9780908990719",
         "edition_info" : "Paperback; 2000-11-29",
         "marc_enc_level" : "~",
         "dewey_normal" : "0",
         "awards_text" : "",
         "isbn10" : "0908990715",
         "title_latin" : "Yes",
         "author_data" : [
            {
               "name" : "Joan Rosier-Jones",
               "id" : "joan_rosier_jones"
            }
         ],
         "publisher_name" : "David Ling Publishing Limited",
         "urls_text" : "",
         "publisher_id" : "david_ling_publishing_limited",
         "book_id" : "yes_a18",
         "dewey_decimal" : "",
         "lcc_number" : "",
         "summary" : "",
         "title_long" : "",
         "physical_description_text" : "208 pages",
         "publisher_text" : "David Ling Publishing Limited",
         "notes" : ""
      },
      {
         "dewey_normal" : "0",
         "edition_info" : "Paperback",
         "marc_enc_level" : "~",
         "isbn13" : "9780933932685",
         "subject_ids" : [],
         "language" : "",
         "title" : "Yes!",
         "book_id" : "yes_a20",
         "publisher_id" : "scepter_publishers",
         "urls_text" : "",
         "publisher_name" : "Scepter Publishers",
         "title_latin" : "Yes!",
         "isbn10" : "0933932685",
         "author_data" : [],
         "awards_text" : "",
         "summary" : "This large size book can be read by adults to pre-school children, and read by grade school children themselves. It shows through a number of incidents the growth in heroic virtue of Blessed Josemaria. Full-color illustrations throughout.",
         "lcc_number" : "",
         "dewey_decimal" : "",
         "notes" : "",
         "publisher_text" : "Scepter Publishers",
         "physical_description_text" : "7.4\"x9.4\"x0.4\"; 0.7 lb; 110 pages",
         "title_long" : ""
      },
      {
         "summary" : "",
         "dewey_decimal" : "833.914",
         "lcc_number" : "",
         "notes" : "Translation of: Ja.",
         "publisher_text" : "London : Quartet, 1991.",
         "physical_description_text" : "135 p. ; 23 cm.",
         "title_long" : "",
         "isbn13" : "9780704327702",
         "subject_ids" : [],
         "dewey_normal" : "833.914",
         "edition_info" : "",
         "marc_enc_level" : "",
         "language" : "eng",
         "title" : "Yes",
         "publisher_id" : "quartet",
         "book_id" : "yes_a14",
         "publisher_name" : "Quartet",
         "title_latin" : "Yes",
         "awards_text" : "",
         "isbn10" : "0704327708",
         "author_data" : [
            {
               "name" : "Bernhard, Thomas",
               "id" : "bernhard_thomas"
            },
            {
               "id" : "osers_ewald",
               "name" : "Osers, Ewald"
            }
         ],
         "urls_text" : ""
      },
      {
         "summary" : "",
         "lcc_number" : "",
         "dewey_decimal" : "",
         "publisher_text" : "Walker Books Ltd",
         "notes" : "",
         "title_long" : "",
         "physical_description_text" : "9.1\"x10.6\"x0.2\"; 0.5 lb; 40 pages",
         "marc_enc_level" : "~",
         "edition_info" : "Paperback; 2007-08-06",
         "dewey_normal" : "0",
         "subject_ids" : [
            "childrens_books"
         ],
         "isbn13" : "9781406304565",
         "title" : "Yes",
         "language" : "",
         "book_id" : "yes_a13",
         "publisher_id" : "walker_books_ltd",
         "urls_text" : "",
         "awards_text" : "",
         "isbn10" : "1406304565",
         "title_latin" : "Yes",
         "author_data" : [
            {
               "id" : "alborough_jez",
               "name" : "Alborough, Jez"
            }
         ],
         "publisher_name" : "Walker Books Ltd"
      },
      {
         "dewey_normal" : "0",
         "marc_enc_level" : "8",
         "edition_info" : "",
         "isbn13" : "9780763631833",
         "subject_ids" : [
            "chimpanzees_juvenile_fiction"
         ],
         "language" : "eng",
         "title" : "Yes",
         "book_id" : "yes_a05",
         "publisher_id" : "candlewick_press",
         "urls_text" : "",
         "publisher_name" : "Candlewick Press",
         "awards_text" : "",
         "author_data" : [
            {
               "id" : "alborough_jez",
               "name" : "Alborough, Jez"
            }
         ],
         "isbn10" : "0763631833",
         "title_latin" : "Yes",
         "summary" : "YES! The cuddly hero of HUG and TALL is back! A young chimpanzee preparing for bedtime learns to say \"Yes\" when things suit him and \"No\" when they do not. Bobo's mother has no trouble getting her little chimp to take a bath. \"Yes!\" he shouts. But when it's bedtime for Bobo, he responds with a definite \"No.\" In this tale of two words, it takes some patient animal friends and plenty of splashing to alter one contrary little chimp's attitude. By popular demand, Jez Alborough brings back the beloved Bobo in a charming bedtime story for every preschooler who loves chimps - and every parent who could use a welcome break from \"No!\"",
         "lcc_number" : "",
         "dewey_decimal" : "",
         "notes" : "",
         "publisher_text" : "Cambridge, MA : Candlewick Press, 2006.",
         "physical_description_text" : "[34] p. : col. ill. ; 25 x 28 cm.",
         "title_long" : ""
      },
      {
         "edition_info" : "Paperback; 2007-11-30",
         "marc_enc_level" : "~",
         "dewey_normal" : "0",
         "subject_ids" : [],
         "isbn13" : "9781846680168",
         "title" : "Yes",
         "language" : "",
         "book_id" : "yes_a12",
         "publisher_id" : "profile_books",
         "urls_text" : "",
         "awards_text" : "",
         "isbn10" : "1846680166",
         "title_latin" : "Yes",
         "author_data" : [
            {
               "name" : "Martin, Steve",
               "id" : "martin_steve"
            }
         ],
         "publisher_name" : "Profile Books",
         "summary" : "",
         "lcc_number" : "",
         "dewey_decimal" : "",
         "publisher_text" : "Profile Books",
         "notes" : "",
         "title_long" : "",
         "physical_description_text" : "224 pages"
      }
   ],
   "keystats" : {
      "key_limit" : "none",
      "key_use_requests" : "6",
      "free_use_limit" : "500",
      "member_use_requests" : 6,
      "key_id" : "J6FR9HT6",
      "key_use_granted" : "6",
      "daily_max_pay_uses" : "0",
      "member_use_granted" : 6
   },
   "current_page" : 1,
   "result_count" : 2352
}
SAMPLE;
}
