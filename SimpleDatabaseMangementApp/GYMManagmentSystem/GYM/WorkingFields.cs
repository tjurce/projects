namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class WorkingFields
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public WorkingFields()
        {
            Instructors = new HashSet<Instructors>();
        }

        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int workingFieldsId { get; set; }

        [Required]
        [StringLength(30)]
        public string fieldName { get; set; }

        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<Instructors> Instructors { get; set; }
    }
}
