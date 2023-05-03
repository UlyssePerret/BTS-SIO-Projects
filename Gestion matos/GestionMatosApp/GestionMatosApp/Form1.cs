using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GestionMatosApp
{
    public partial class Form1 : Form
    {
        private string Mode = "Update";
        private DataClassesOneDataContext m_db = null;

        public Form1()
        {
            InitializeComponent();
            m_db = new DataClassesOneDataContext();
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            PopulateCategoryCombo();
            PopulateSupplierCombo();
            PopulateProductList();

            EnableModify(false);
        }

        private void EnableModify(bool p)
        {
            throw new NotImplementedException();
        }

        private void PopulateProductList()
        {
            throw new NotImplementedException();
        }

        private void PopulateSupplierCombo()
        {
            throw new NotImplementedException();
        }

        private void PopulateCategoryCombo()
        {
            throw new NotImplementedException();
        }

        private void button3_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void checkBox4_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void dataGridView2_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'gestionMatosDataSet.Intervention' table. You can move, or remove it, as needed.
            this.interventionTableAdapter.Fill(this.gestionMatosDataSet.Intervention);
            // TODO: This line of code loads data into the 'gestionMatosDataSet.Client' table. You can move, or remove it, as needed.
            this.clientTableAdapter.Fill(this.gestionMatosDataSet.Client);
            // TODO: This line of code loads data into the 'gestionMatosDataSet.Matériel' table. You can move, or remove it, as needed.
            this.matérielTableAdapter.Fill(this.gestionMatosDataSet.Matériel);
            // TODO: This line of code loads data into the 'gestionMatosDataSet.Site' table. You can move, or remove it, as needed.
            this.siteTableAdapter.Fill(this.gestionMatosDataSet.Site);

        }

        private void buttonClient_Click(object sender, EventArgs e)
        {
            Client frc = new Client();
            DialogResult dlgR;
            dlgR = frc.ShowDialog();
        }

        private void buttonMateriel_Click(object sender, EventArgs e)
        {
            Materiel frc = new Materiel();
            DialogResult dlgR;
            dlgR = frc.ShowDialog();
        }
    }
}
