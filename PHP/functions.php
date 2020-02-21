<?php
    header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP functions practice</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="wrapper">
            <?php
              $text1 = "Praesent id finibus nisi. Ut eu porttitor diam, ut vestibulum tortor. Donec interdum a libero eget blandit. Pellentesque consectetur aliquet fringilla. Nulla facilisi. Maecenas vehicula eget elit eget tempus. Pellentesque lectus dolor, maximus eu leo et, imperdiet vehicula dolor. Cras eros tellus, viverra id odio non, elementum sollicitudin nulla. Morbi euismod, eros vitae porta venenatis, elit ipsum dictum elit, ac aliquet diam enim non lacus. Praesent id purus orci. Ut tortor nunc, porta ut ligula vitae, egestas laoreet felis. Quisque quis elit sit amet sapien sollicitudin posuere cursus sit amet sem. Suspendisse sollicitudin, mauris a vestibulum mattis, nisl lacus ullamcorper erat, at fermentum justo ligula vitae dui. Aliquam placerat arcu lectus, convallis consectetur eros tincidunt at. Aenean interdum vehicula dapibus. Nulla turpis odio, feugiat quis ultricies pellentesque, maximus eget risus.
              Mauris viverra bibendum nisl ac malesuada. Pellentesque accumsan massa at lectus consequat, id auctor diam pellentesque. Vivamus congue nec ante non consequat. Morbi at velit quis est consectetur placerat. Duis ac purus est. Donec eget sapien velit. Praesent at tempor nulla, eu placerat nunc. In consectetur leo sit amet tortor ultricies, in eleifend tellus auctor. Etiam quis urna pulvinar, auctor elit eget, scelerisque nisi.
              Aenean turpis erat, elementum venenatis libero vitae, accumsan vehicula justo. Donec elementum ultrices magna, sed porttitor tellus convallis quis. Donec cursus eros sit amet felis volutpat, vel vestibulum purus aliquam. Fusce mattis consectetur nulla, quis tincidunt nisl venenatis nec. Fusce id tincidunt lacus. Nunc ultricies consequat ante id laoreet. Mauris varius luctus diam non varius. Duis placerat aliquet mollis. Nullam at sapien nec orci fringilla dictum ut sed ipsum. In eu nisi pulvinar neque euismod blandit non ac dui. Proin scelerisque, odio vel mollis egestas, tellus tortor porttitor enim, eget tincidunt sapien quam sed ligula. Nam eu lectus vel nisi lacinia blandit eget eget enim. Phasellus a augue tempus, dictum orci nec, convallis lorem. Ut tincidunt dapibus felis nec cursus.
              Donec fermentum mollis nisi, sodales dapibus velit. Vivamus cursus erat interdum nisl gravida convallis sed eu orci. Donec vel ex fringilla, iaculis sem at, tincidunt sapien. Vivamus nibh odio, dapibus in ornare a, feugiat vitae massa. Maecenas ullamcorper consequat nunc a semper. Etiam maximus, lacus eu ornare mattis, ligula erat gravida urna, eget convallis urna orci sit amet magna. Duis bibendum dolor a eros sagittis, eget iaculis metus suscipit.
              Sed ante tellus, imperdiet eu bibendum vel, facilisis in orci. Sed turpis erat, auctor volutpat velit non, accumsan accumsan enim. Nam ultricies finibus mi, ut facilisis diam cursus at. Suspendisse et augue nec augue vulputate eleifend quis id lectus. Nunc eu eros est. Nullam nec felis et nibh rhoncus ultricies. Duis sed faucibus sapien. Sed mi dolor, tempor in suscipit nec, tristique et enim. Donec vitae molestie felis. Phasellus lobortis auctor risus, sit amet eleifend lectus consectetur ac. Duis nec nunc tortor. Etiam interdum ipsum neque, id bibendum eros commodo tempor. Proin eget justo nec ipsum bibendum mollis in in velit. Fusce ac ligula vitae tellus ultrices facilisis. Sed massa nunc, cursus eget dignissim quis, ornare vitae.
              ";
          
              $text2 = "To be, or not to be, that is the question:
              Whether 'tis nobler in the mind to suffer
              The slings and arrows of outrageous fortune,
              Or to take arms against a sea of troubles
              And by opposing end them. To die—to sleep,
              No more; and by a sleep to say we end
              The heart-ache and the thousand natural shocks
              That flesh is heir to: 'tis a consummation
              Devoutly to be wish'd. To die, to sleep;
              To sleep, perchance to dream—ay, there's the rub:
              For in that sleep of death what dreams may come,
              When we have shuffled off this mortal coil,
              Must give us pause—there's the respect
              That makes calamity of so long life.
              For who would bear the whips and scorns of time,
              Th'oppressor's wrong, the proud man's contumely,
              The pangs of dispriz'd love, the law's delay,
              The insolence of office, and the spurns
              That patient merit of th'unworthy takes,
              When he himself might his quietus make
              With a bare bodkin? Who would fardels bear,
              To grunt and sweat under a weary life,
              But that the dread of something after death,
              The undiscovere'd country, from whose bourn
              No traveller returns, puzzles the will,
              And makes us rather bear those ills we have
              Than fly to others that we know not of?
              Thus conscience does make cowards of us all,
              And thus the native hue of resolution
              Is sicklied o'er with the pale cast of thought,
              And enterprises of great pitch and moment
              With this regard their currents turn awry
              And lose the name of action.
              ";
              echo 'Length of text1: ';
              echo strlen($text1). '</br>';
          
              echo 'Text 1 in uppercase: </br>';
              echo strtoupper($text1. '</br>');
          
              echo 'Text 1 in lowercase: </br>';
              echo strtolower($text1. '</br>');
          
              echo 'Replace \'diam\' with \'BANANAAAA\': </br>';
              echo str_replace('diam', 'BANANAAAAA', $text1). '</br>';
          
              echo 'Replace every \'e\' by \'z\': </br>';
              echo str_replace('e', 'z', $text1). '</br>';
          
              echo 'Shuffle text2: </br>';
              echo str_shuffle($text2). '<br>';

              echo 'Display date and time: </br>';
              echo date("l") .'</br>'; //Monday
              echo date('l jS \o\f M Y h:i:s A').'</br>'; // Monday 8th of August 2005 03:12:46 PM
              echo date('l \t\h\e jS').'</br>';  // Wednesday the 15th
              echo date('M d, Y, h:i a').'</br>';  // March 10, 2001, 5:16 pm
              echo date('m.d.y').'</br>'; // 03.10.01
              echo date('d, m, Y').'</br>'; // 10, 3, 2001
              echo date('Ymd').'</br>'; // 20010310
              echo date("h-i-s, j-m-y, it is w Day").'</br>'; // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
              echo date('\I\t\ \i\s\ \t\h\e jS \d\a\y').'</br>'; // It is the 10th day
              echo date('D M d H:i:s T Y').'</br>'; // Sat Mar 10 17:16:18 MST 2001
              echo date('H:i:s \m\ \i\s \t\h\e \m\o\n\t\h').'</br>'; // 17:03:18 m is the month
              echo date('H:i:s').'</br>'; // 17:16:18
              echo date('Y-m-d H:i:s').'</br>'; // 2001-03-10 17:16:18 (DATETIME format of MySQL)
            ?>
        </div>
    </body>
</html>
  