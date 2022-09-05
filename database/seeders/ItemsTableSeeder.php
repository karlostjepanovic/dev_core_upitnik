<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'question' => 'Osjećao sam se jako usamljeno i izolirano',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam se napeto, tjeskobno ili nervozno',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Znao sam da se mogu na nekoga osloniti ako mi zatreba',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam zadovoljan sa sobom',
            'dimension' => 'W',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam potpuno bez volje i energije',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam fizički nasilan prema drugima',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Mogao sam se nositi s poteškoćama',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Mučili su me bolovi ili drugi tjelesni problemi',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Padalo mi je napamet da se ozlijedim',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bilo mi je prenaporno razgovarati s drugima',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Napetost i tjeskoba sprječavali su me u obavljanju važnih stvari',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam zadovoljan s onim što sam napravio',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Uznemiravale su me neželjene misli i osjećaji',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Došlo mi je da zaplačem',
            'dimension' => 'W',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam paniku ili užas',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Planirao sam si oduzeti život',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam da su me problemi preplavili',
            'dimension' => 'W',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Imao sam problema sa spavanjem',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam bliskost prema nekom',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Previše sam brinuo o svojim problemima',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam u stanju obaviti gotovo sve što sam trebao',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Prijetio sam nekome ili ga zastrašivao',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam se očajno ili beznadno',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Razmišljao sam kako bi bilo bolje da me nema',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam se kritizirano',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Činilo mi se da nemam prijatelja',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam nesretan',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Uznemiravale su me neugodne slike i sjećanja',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam razdražljiv u prisutnosti drugih',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Mislio sam da sam kriv za svoje probleme',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Bio sam optimističan u vezi svoje budućnosti',
            'dimension' => 'W',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Postizao sam ono što sam želio',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećao sam se poniženo ili posramljeno',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Namjerno sam se fizički ozljeđivao ili izlagao svoje zdravlje ozbiljnom riziku',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 1,
        ]);
        Item::create([
            'question' => 'Osjećala sam se jako usamljeno i izolirano',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam se napeto, tjeskobno ili nervozno',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Znala sam da se mogu na nekoga osloniti ako mi zatreba',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam zadovoljna sa sobom',
            'dimension' => 'W',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam potpuno bez volje i energije',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam fizički nasilna prema drugima',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Mogla sam se nositi s poteškoćama',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Mučili su me bolovi ili drugi tjelesni problemi',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Padalo mi je napamet da se ozlijedim',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bilo mi je prenaporno razgovarati s drugima',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Napetost i tjeskoba sprječavali su me u obavljanju važnih stvari',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam zadovoljna s onim što sam napravila',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Uznemiravale su me neželjene misli i osjećaji',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Došlo mi je da zaplačem',
            'dimension' => 'W',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam paniku ili užas',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Planirala sam si oduzeti život',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam da su me problemi preplavili',
            'dimension' => 'W',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Imala sam problema sa spavanjem',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam bliskost prema nekom',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Previše sam brinula o svojim problemima',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam u stanju obaviti gotovo sve što sam trebala',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Prijetila sam nekome ili ga zastrašivala',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam se očajno ili beznadno',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Razmišljala sam kako bi bilo bolje da me nema',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam se kritizirano',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Činilo mi se da nemam prijatelja',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam nesretna',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Uznemiravale su me neugodne slike i sjećanja',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam razdražljiva u prisutnosti drugih',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Mislila sam da sam kriva za svoje probleme',
            'dimension' => 'P',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Bila sam optimistična u vezi svoje budućnosti',
            'dimension' => 'W',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Postizala sam ono što sam željena',
            'dimension' => 'F',
            'ascending_order' => false,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Osjećala sam se poniženo ili posramljeno',
            'dimension' => 'F',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
        Item::create([
            'question' => 'Namjerno sam se fizički ozljeđivala ili izlagala svoje zdravlje ozbiljnom riziku',
            'dimension' => 'R',
            'ascending_order' => true,
            'questionnaire_id' => 2,
        ]);
    }
}
