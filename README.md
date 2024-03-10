# MANAGE KITCHEN
La cucina di un ristorante stellato vuole realizzare un sistema integrato su tablet e usufruibile in tutte le loro sedi in italia per la gestione della cucina e degli impieghi.

> Ogni cucina è identificata da un nome ristorante, luogo,
> 
## CUOCHI E MANSIONI
In ogni **cucina** registrata lavora uno o più cuochi suddivisi nelle seguenti categorie:

* Il direttore di cucina

* Il capo cuoco

* Il sous chef

* Il cuoco capo partita

* Il demi chef de partie

* L'aiuto cuoco
  
* altro

> I cuochi vengono identificati attraverso un nome e un cognome, e vengono caratterizzati da mese e anno di inizio lavoro nella cucina, opzionale è mese e anno di fine lavoro nella cucina. 

Ogni cuoco registrato ha una o più **mansioni** assegnate relative alla preparazione dei piatti (es: **sfilettare pesce, tagliare verdure, infornare il pane**), le mansioni sono destinate ad una specifica time line corrispondente ad un pasto della giornata (colazione, pranzo, aperitivo, cena) e devono corrispondere ad un piatto specifico appartenente al **menù** del ristorante. 
> Ogni piatto è identificato da un nome, tempo di preparazione in ore, una lista di allergeni alla quale fa riferimento
> 
La mansione della preparazione di un piatto contribuisce alla realizzazione di esso ma comporta un progressivo esaurrimento delle scorte di cibo presenti in cucina, e per questo dovrà essere registrato uno storico dell'uso delle scorte e perciò aggiornare anche quelle rimanenti.

## CIBI E MENU
Il ristorante come già accennato avrà un menù con tutti i piatti che il ristorante serve, alcuni potranno anche essere occasionali in base alla stagione. Ogni piatto comporta per la realizzazione una specifica quantità di risorse che deve essere collegata al singolo piatto, tali risorse devono essere visionate in base a quante già possedute nella riserva della cucina e in base a quanti piatti vengono sfornati nella giornata.
Perciò il sistema deve tenere traccia di quanti e quali piatti del menù vengono serviti nel corso della giornata, di conseguenza tenere traccia delle riserve di cibo nella cucina e segnalare quando una scorta finisce.
> Ogni cibo è idenfiticato da un nome, quantità (espressa in etti) presente nella riserva, data di aggiunta, data di scadenza, temperatura per la conservazione
> 
Ogni cibo associato ad un piatto e presente nella riserva può appartenere ad una ed una sola delle seguenti categorie:

* Carne

* Pesce

* Verdure

* Legumi

* Frutta

* Spezie

* Latticini

* Bevande
  
* altro

## SISTEMA DI FATTURAZIONE
Le risorse presenti in cucina e nella riserva al momento dell'aggiunta di scorte viene aggiunta la quantità ai specifici settori dal cuoco, ma il progressivo decremento viene registrato al momento dell'ordine che il cameriere segna sul sistema, tale ordine verrà visualizzato dai cuochi in cucina ed al momento del pagamento del cliente il totale sarà dato dalla somma dei prezzi specifici assegnati direttamente ad ogni singolo pasto consumato.
> L'ordine viene identificato da quali piatti ha ordinato, un totale dato dal prezzo dei piatti ordinati, una data(giorno,mese,anno) ed la fascia oraria di appartenenza (colazione, pranzo, cena)
>
Il sistema deve gestire anche i tavoli ai quali viene assegnato uno o più ordini nel corso di un pasto. Al momento del saldo il tavolo deve essere liberato.