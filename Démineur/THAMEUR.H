#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <graphics.h>
#include <string.h>
#include <dos.h>
#include <time.h>
#include <math.h>
#define l_bouton 15
#define espace 1
#define maxx 35
#define maxy 20
#define enreg_scores "hiscores.thm"


clock_t start;
struct	point	{
		int x ;
		int y ;
		}
			debut; 	//premier coin de la matrice
int vx=4,vy=4;			//Vitesses du pointeur de la sourie
int l_matrice = 0;		//Largeur de la matrice
int L_matrice = 0;          //Longueur de la matrice

char grille[maxx][maxy];         //Ce que cachent les boutons
int marque[maxx][maxy];          //marqu‚e ou non,d‚ja appuy‚e ou non
int nx=10,ny=15;       //nombre de boutons par ligne et par colonne
int bouton1=0;         //etat du bouton gauche de la sourie
int bouton2=0;         //etat du bouton droit de la sourie
int xcurseur;          //position x du curseur
int ycurseur;          //position y du curseur
int bombes=10;
int compt;
int dep;
int compt2;

int x=70;
char d[2];
int ax;
int y1=35;
int y2=60;
void accueuil(void);
int appuyee;
void restore(void);
void personnalise(void);
void restantes(int tham);
void ouverture(void);
void sauvegarde(void);
void sauve_jeu(void);
void attente2(void);
void options(void);
void apropos(void);
void nouveau_jeu(void);
void bn(int etat ,int i,int j);
int lache(void);
void jnoun(int o,int p,int oo,int pp);
int compbombes(int i,int j);
int iconvert(int x);
void suivant (void);
void appel(void);
int jconvert(int y);
void bordure(void);
void nonsourie(void);
void attente(void);
void arriereplan(void);
void cercle(void);
void menu_options(void);
void sourie(void);
void nonsourie(void);
void init(void);
void matrice(void);
void boutons(void);
void initg(void);

void jeu(void);
void etat_sourie(void);
void etat_sourie2(void);
void cadre3D(int x1,int y1,int x2,int y2);
void help(void);
int codage(char *chaine)
{
int j,x=0,aux=strlen(chaine)-1;
for(j=0 ; chaine[j]!='\0' ; j++)
	x += (chaine[j]-'0')*pow(10,aux--);
return(x);
}

void seg_a(void);
void seg_b(void);
void seg_c(void);
void seg_d(void);
void seg_e(void);
void seg_f(void);
void seg_g(void);
void afficheur7(char chaine[4],int ss,int bb);

