#include <myconio.h>
#include <stdio.h>
#include <stdlib.h>

int tab[10][10]={0}; // grille de jeu
int Nmine;
int drapeaux;

void placeMines()
{
    int x, y, i;
    for(i=0; i<10;i++){
    x = rand()%10;
    y = rand()%10;
    if(tab[x][y] != 9) tab[x][y] = 9;
    else i--;
    }
}

void affiche()
{
    int i, j;
    for(i=0; i<10; i++)
    {
        for(j=0; j<10; j++)
        {
            printf("-");
        }
        printf("\n");
    }
}

void afficheTab()
{
    int i, j;
    for(i=0; i<10; i++)
    {
        for(j=0; j<10; j++)
        {
            printf("%d", tab[i][j]);
        }
        printf("\n");
    }
}

int verifmine(int verifm, int posa, int posb)
{
    if( tab[posa][posb]==9) {verifm=1;}

}

int compteurmineautour(int posa,int posb, int temp)//Fonctionment de compteur de mine autour
{
    int a, b,i,j, nbmines;
    a=posa;
    b=posb;
nbmines=0;

    switch(posa)
    {
    case 0 :
if( posb==10)
        {
    if (tab[a][b--]==9) {nbmines++;}
if(tab[a++][b]==9) {nbmines++;}
if(tab[a++][b--]==9) {nbmines++;}
        }
else if( posb==0)
    {
if (tab[a++][b]==9) {nbmines++;}
if(tab[a][b++]==9) {nbmines++;}
if(tab[a++][b++]==9) {nbmines++;}
    }
else
{
    if (tab[a++][b--]==9) {nbmines++;}
    if (tab[a++][b]==9) {nbmines++;}
    if (tab[a++][b++]==9) {nbmines++;}
    if (tab[a][b--]==9) {nbmines++;}
    if (tab[a][b++]==9) {nbmines++;}
}
    break;
    case 10 :
if( posb==0)
    {
if (tab[a--][b]==9) {nbmines++;}
if(tab[a][b++]==9) {nbmines++;}
if(tab[a--][b++]==9) {nbmines++;}
    }
else if( posb==10)
{
if (tab[a--][b]==9) {nbmines++;}
if(tab[a][b--]==9) {nbmines++;}
if(tab[a--][b--]==9) {nbmines++;}
}
else
{
   if (tab[a--][b--]==9) {nbmines++;}
    if (tab[a--][b]==9) {nbmines++;}
    if (tab[a--][b++]==9) {nbmines++;}
    if (tab[a][b--]==9) {nbmines++;}
    if (tab[a][b++]==9) {nbmines++;}
}
    break;
    default :
    for(posa=a--; posa==a++; posa++)
        {
            for(posb=b--; posb==b++; posb++)
            {
                if(tab[posa][posb]==9)
                {
                    nbmines++;
                }
            }
        }
    break;
    }

    for(i=0; i<=posa; i++)
    {
        for(j=0;j<=posb;j++)
        {
gotoxy(i,j);
if(i==posa && j==posb)
{
    printf("%d",nbmines);
}
else{}
        }
    }
    nbmines=0;
}

void retableaud(int posa,int posb)//Reimpression
{
int i, j;
    for(i=0; i<=posa;i++)
    {
        for(j=0;j<=posb;j++)
        {
gotoxy(i,j);
if(i==posa && j==posb)
{

            printf("D");
        }

    }
    }

}

main()
{
    srand(time(NULL));
    int a=0, b=0,cptm, verifm=0, temp=0 ,mines=0;
    int trouve=0;
    char touche;
    affiche();
    placeMines();
    afficheTab();
    gotoxy(a,b);
 do{
    touche = getch();
    if(touche == -32)// premiere valeur -32 seconjde valeur dépende haut 72; gauche 75; bas 80; droite 77
    {
 touche = getch();
 switch(touche)
     {
    case 72 : if(b>0)gotoxy(a,--b);//haut
         break;
    case 75 : if(a>0) gotoxy(--a,b); //gauche
         break;
    case 77 : if(a<9) gotoxy(++a,b); //droite
         break;
    case 80 :if(b<9) gotoxy(a,++b);//bas
         break;
     default:
        break;
     }
    }

else if (touche== 70) // F
{ temp=0;

verifmine(verifm,a,b);

if (verifm==1)
{
    gotoxy(44,20);
    printf("vous avez perdu");
    break;
}
else {
compteurmineautour(a,b,temp);

}
}
else if (touche ==68 && verifm !=1) //D
{
    retableaud(a,b);
    verifmine(verifm,a,b);
    if(verifm=1)
{mines++;}
verifm=0;
}

else if (mines == 10 && verifm !=1)
{
    printf("Vous avez Gagnez appuyez sur Echap");
    verifm=1;
}
}while(touche!=27 || verifm ==1);//27=> echap

gotoxy(45, 20);

}

// D = drapeau  068      , F = fouille 070, C=067
